namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('login')) {
            return redirect()->route('login'); // arahkan ke halaman login
        }

        $userRole = Session::get('user_type');
        $current_page = $request->path();

        $adminPanel = [
            'dashboard', 'category', 'customer', 'product', 
            'customer-order', 'data-transaksi', 'edit-product', 'edit-harga'
        ];

        if ($userRole === 'admin' && !in_array($current_page, $adminPanel)) {
            return redirect()->route('admin.dashboard');
        }

        if ($userRole === 'customer') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
