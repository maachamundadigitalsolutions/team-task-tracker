namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Task;

class Dashboard extends Component
{
    public $usersCount;
    public $tasksCount;
    public $tasks;

    public function mount()
    {
        $this->usersCount = User::count();
        $this->tasksCount = Task::count();
        $this->tasks = Task::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
