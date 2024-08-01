namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function index()
{
$users = User::all();
return view('users.index', compact('users'));
}

public function create()
{
return view('users.create');
}

public function store(Request $request)
{
$request->validate([
'username' => 'required|unique:users',
'password' => 'required',
'email' => 'required|email|unique:users',
'first_name' => 'nullable',
'last_name' => 'nullable',
'status' => 'nullable',
]);

$user = new User();
$user->username = $request->username;
$user->password = bcrypt($request->password);
$user->email = $request->email;
$user->first_name = $request->first_name;
$user->last_name = $request->last_name;
$user->status = $request->status;
$user->save();

return redirect()->route('users.index');
}

public function show($id)
{
$user = User::findOrFail($id);
return view('users.show', compact('user'));
}

public function edit($id)
{
$user = User::findOrFail($id);
return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
$request->validate([
'username' => 'required|unique:users,username,' . $id,
'password' => 'nullable',
'email' => 'required|email|unique:users,email,' . $id,
'first_name' => 'nullable',
'last_name' => 'nullable',
'status' => 'nullable',
]);

$user = User::findOrFail($id);
$user->username = $request->username;
if ($request->password) {
$user->password = bcrypt($request->password);
}
$user->email = $request->email;
$user->first_name = $request->first_name;
$user->last_name = $request->last_name;
$user->status = $request->status;
$user->save();

return redirect()->route('users.index');
}

public function destroy($id)
{
$user = User::findOrFail($id);
$user->delete();

return redirect()->route('users.index');
}
}
