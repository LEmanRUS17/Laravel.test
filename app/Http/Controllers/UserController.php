<?php


namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Storage;

use PDF;

class UserController extends Controller
{
    /**
     * Отображает список ресурсов
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Выводит форму для создания нового ресурса
     */
    public function create()
    {
        return view('users.create');
    }

    public function filling (Request $request)
    {
        $request->validate([
            'Lastname'   => 'required|string|max:50',
            'Firstname'  => 'required|string|max:50',
            'Secondname' => 'required|string|max:50',
            'Debt'       => 'required|max:11',
        ]);

        $this->calculate($request, 4);
    }
    /**
     * Помещает созданный ресурс в хранилище
     */
    public function store(Request $request)
    {
        $this->filling($request);

        User::create($request->all());

        return redirect()->route('users.index')->with('success','Запись успешно создана');
    }

    /**
     * Расчет госпошлины
     */
    public function calculate(Request $request, $interest){
        $request["StateFee"] = $request["Debt"] * ($interest / 100);
    }

    /**
     * Отображает указанный ресурс.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Обновляет указанный ресурс в хранилище
     */
    public function update(Request $request, User $user)
    {
        $this->filling($request);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success','Запись успешно изменена');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','Запись удалена');
    }

    /**
     * Экспорт таблицы в Excel
     */
    public function export()
    {
        //Excel::store(new UsersExport, 'Список.xlsx');
        //return response(Storage::get('Список.xlsx'))->header('Content-type', Storage::mimeType('Список.xlsx'));
        return Excel::download(new UsersExport, 'Список.xlsx');
    }

    /**
     * Представление в PDF
     */
    public function pdf(Request $request, $id)
    {
        $user = User::find($id);
        $pdf = PDF::loadView('users.pdf', compact('user'));

        if ($request->has('export')) {
            if ($request->get('export') == 'pdf') {

                return $pdf->download("Пользователь: $user->Lastname.pdf");
            }
        }

        return $pdf->stream('users.pdf');
    }
}
