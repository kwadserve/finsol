<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPanDetail;
use App\Models\UserGstDetail;
use App\Models\UserTanDetail;
use App\Models\UserEpfDetail;
use App\Models\UserEsicDetail;
use App\Models\UserHufDetail;
use App\Models\UserTrustDetail;
use App\Models\UserTrademarkDetail;
use App\Models\UserCompanyDetail;
use App\Models\UserUdamyDetail;
use App\Models\UserPartnershipDetail;
use App\Models\UserImportExportDetail;
use App\Models\UserFactoryLicenseDetail;
use App\Models\UserLabourDetail;
use App\Models\UserShopDetail;
use App\Models\UserIsoDetail;
use App\Models\UserFssaiDetail;
use App\Models\UserItrDetail;
use App\Models\UserTdsDetail;
use App\Models\UserTaxauditDetail;
use App\Models\UserISIDetail;
use App\Models\LoanFinance\CMA;
use App\Models\LoanFinance\Estimated;
use App\Models\LoanFinance\ProjectReport;
use App\Models\LegalWork;
use App\Models\CompaniesAct\UserMgtDetail;
use App\Models\CompaniesAct\UserAdtDetail;
use App\Models\CompaniesAct\UserAocDetail;
use App\Models\CompaniesAct\UserMinutesDetail;
use App\Models\CompaniesAct\UserDinkycDetail;
use App\Models\CompaniesAct\UserStatutoryAuditDetail;
use App\Models\Certification\UserCaDetail;
use App\Models\Certification\UserNetworthDetail;
use App\Models\Certification\UserTurnoverDetail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        View::share('nav', 'dashboard');
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function user_list()
    {
        $user = Auth::user();
        switch ($user->type_of_user) {
            case 'State Office':
                $data['users'] = User::select('name', 'image', 'status', 'email', 'id')
                    ->where('state', $user->access_level_id)
                    ->orderBy('id', 'DESC')
                    ->get();
                break;

            case 'District Office':
                $data['users'] = User::select('name', 'image', 'status', 'email', 'id')
                    ->where('district', $user->access_level_id)
                    ->orderBy('id', 'DESC')
                    ->get();
                break;

            case 'Block Office':
                $data['users'] = User::select('name', 'image', 'status', 'email', 'id')
                    ->where('block', $user->access_level_id)
                    ->orderBy('id', 'DESC')
                    ->get();
                break;

            default:
                $data['users'] = User::select('name', 'image', 'status', 'email', 'id')
                    ->orderBy('id', 'DESC')
                    ->get();
        }

        return $data;
    }

    public function form_list(Request $request)
    {
        $list = AdminController::user_list();
        $users = [];
        foreach ($list['users'] as $user) {
            $users[] = (int) $user->id;
        }
        switch ($request->form_type) {
            case 'pan':
                $data['forms'] = UserPanDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'tan':
                $data['forms'] = UserTanDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'gst':
                $data['forms'] = UserGstDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'epf':
                $data['forms'] = UserEpfDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'esic':
                $data['forms'] = UserEsicDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'huf':
                $data['forms'] = UserHufDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'trust':
                $data['forms'] = UserTrustDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'trademark':
                $data['forms'] = UserTrademarkDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'company':
                $data['forms'] = UserCompanyDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'udamy':
                $data['forms'] = UserUdamyDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'partnership':
                $data['forms'] = UserPartnershipDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'import':
                $data['forms'] = UserImportExportDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'factory':
                $data['forms'] = UserFactoryLicenseDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'labour':
                $data['forms'] = UserLabourDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'shop':
                $data['forms'] = UserShopDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'iso':
                $data['forms'] = UserIsoDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'fssai':
                $data['forms'] = UserFssaiDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'itr':
                $data['forms'] = UserItrDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'tds':
                $data['forms'] = UserTdsDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'tax':
                $data['forms'] = UserTaxauditDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'isi':
                $data['forms'] = UserISIDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/forms/dashboard/details');
                break;
            case 'cma':
                $data['forms'] = CMA::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/loan-finance/dashboard/details');
                break;
            case 'estimated':
                $data['forms'] = Estimated::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/loan-finance/dashboard/details');
                break;
            case 'project_report':
                $data['forms'] = ProjectReport::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/loan-finance/dashboard/details');
                break;
            case 'legal':
                $data['forms'] = LegalWork::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/legal-work/dashboard/details');
                break;
            case 'mgt':
                $data['forms'] = UserMgtDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'adt':
                $data['forms'] = UserAdtDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'aoc':
                $data['forms'] = UserAocDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'minute':
                $data['forms'] = UserMinutesDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'din_kyc':
                $data['forms'] = UserDinkycDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'sa':
                $data['forms'] = UserStatutoryAuditDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/companiesact/dashboard/details');
                break;
            case 'ca':
                $data['forms'] = UserCaDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/certification/dashboard/details');
                break;
            case 'worth':
                $data['forms'] = UserNetworthDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/certification/dashboard/details');
                break;
            case 'turnover':
                $data['forms'] = UserTurnoverDetail::whereIn('status', [1, 2, 3, 4])
                    ->whereIn('user_id', $users)
                    ->orderBy('id', 'DESC')
                    ->get();
                $data['url'] = url('admin/user/certification/dashboard/details');
                break;
            default:
        }
        return view('admin.pages.forms.dashboard')->with($data);
    }
}
