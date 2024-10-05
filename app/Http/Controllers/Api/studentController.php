namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students' => $students, 'status' => 200], 200);
    }

    public function store(Request $request)
    {
        $validator = $this->validateStudent($request);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        $student = Student::create($request->all());

        return response()->json(['student' => $student, 'status' => 201], 201);
    }

    public function show($id)
    {
        $student = $this->findStudent($id);
        if (!$student) {
            return $this->notFoundResponse();
        }

        return response()->json(['student' => $student, 'status' => 200], 200);
    }

    public function destroy($id)
    {
        $student = $this->findStudent($id);
        if (!$student) {
            return $this->notFoundResponse();
        }

        $student->delete();

        return response()->json(['message' => 'Estudiante eliminado', 'status' => 200], 200);
    }

    public function update(Request $request, $id)
    {
        $student = $this->findStudent($id);
        if (!$student) {
            return $this->notFoundResponse();
        }

        $validator = $this->validateStudent($request, true); // true para indicar que es actualización

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        $student->update($request->all());

        return response()->json(['message' => 'Estudiante actualizado', 'student' => $student, 'status' => 200], 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $student = $this->findStudent($id);
        if (!$student) {
            return $this->notFoundResponse();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'email' => 'email|unique:students,email,' . $id, // Excluir el estudiante actual
            'phone' => 'digits:10',
            'language' => 'in:English,Spanish,French'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        $student->fill($request->only(['name', 'email', 'phone', 'language']));
        $student->save();

        return response()->json(['message' => 'Estudiante actualizado', 'student' => $student, 'status' => 200], 200);
    }

    private function validateStudent(Request $request, $isUpdate = false)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students' . ($isUpdate ? ',email,' . $request->id : ''),
            'phone' => 'required|digits:10',
            'language' => 'required|in:English,Spanish,French'
        ];

        return Validator::make($request->all(), $rules);
    }

    private function validationErrorResponse($validator)
    {
        return response()->json([
            'message' => 'Error en la validación de los datos',
            'errors' => $validator->errors(),
            'status' => 400
        ], 400);
    }

    private function findStudent($id)
    {
        return Student::find($id);
    }

    private function notFoundResponse()
    {
        return response()->json(['message' => 'Estudiante no encontrado', 'status' => 404], 404);
    }
}


