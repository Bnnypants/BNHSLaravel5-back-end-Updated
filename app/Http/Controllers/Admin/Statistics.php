<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class Statistics extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    


 $present_schoolyear = SchoolYear::where('status','active')->orWhere('status','paused')->first();



 $past_schoolyear = SchoolYear::where('year_start',$present_schoolyear->year_start - 1)->first();

 $past = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->count();
 $present = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start)->count();


  $past_students = DB::table('user_schoolyear')->where('schoolyear_start', $present_schoolyear->year_start - 1)->get();

          $past_g7 = 0;
        $past_g8 = 0;
        $past_g9 = 0;
        $past_g10 = 0;
        $past_g11 = 0;
        $past_g12 = 0;

        $past_gas = 0;
        $past_humms = 0;
        $past_tvl = 0;
        $past_cookery = 0;
        $past_ict = 0;
        $past_abm = 0;
        $past_stem = 0;

foreach( $past_students as $past_student){

 


    if($past_student->gradeleveltoenrolin == 'Grade 7'){

        $past_g7++;

    }


    if($past_student->gradeleveltoenrolin == 'Grade 8'){

        $past_g8++;

    }

    if($past_student->gradeleveltoenrolin == 'Grade 9'){

        $past_g9++;

    }

    if($past_student->gradeleveltoenrolin == 'Grade 10'){

        $past_g10++;

    }

    if($past_student->gradeleveltoenrolin == 'Grade 11'){

        $past_g11++;

        if($past_student->strandtoenrolin == 'HUMMS'){

        $past_humms++;

        }


        if($past_student->strandtoenrolin == 'GAS'){

        $past_gas++;

        }


        if($past_student->strandtoenrolin == 'TVL'){

        $past_tvl++;

        }


        if($past_student->strandtoenrolin == 'COOKERY'){

        $past_cookery++;

        }

        if($past_student->strandtoenrolin == 'STEM'){

        $past_stem++;

        }

        if($past_student->strandtoenrolin == 'ABM'){

        $past_abm++;

        }

    }

    if($past_student->gradeleveltoenrolin == 'Grade 12'){
     
        $past_g12++;

            if($past_student->strandtoenrolin == 'HUMMS'){

        $past_humms++;

        }


        if($past_student->strandtoenrolin == 'GAS'){

        $past_gas++;

        }


        if($past_student->strandtoenrolin == 'TVL'){

        $past_tvl++;

        }


        if($past_student->strandtoenrolin == 'COOKERY'){

        $past_cookery++;

        }

        if($past_student->strandtoenrolin == 'STEM'){

        $past_stem++;

        }

        if($past_student->strandtoenrolin == 'ABM'){

        $past_abm++;

        }

    }


}


  $present_students = DB::table('role_user')->where('role_id', '2')->get();

        $present_g7 = 0;
        $present_g8 = 0;
        $present_g9 = 0;
        $present_g10 = 0;
        $present_g11 = 0;
        $present_g12 = 0;

        $present_gas = 0;
        $present_humms = 0;
        $present_tvl = 0;
        $present_cookery = 0;
        $present_ict = 0;
        $present_abm = 0;
        $present_stem = 0;



// /dd( $present_students);
foreach( $present_students as $present_student){

    $student = DB::table('users')->where('id' ,$present_student->user_id)->first();


    if($student->gradeleveltoenrolin == 'Grade 7'){

        $present_g7++;

    }


    if($student->gradeleveltoenrolin == 'Grade 8'){

        $present_g8++;

    }

    if($student->gradeleveltoenrolin == 'Grade 9'){

        $present_g9++;

    }

    if($student->gradeleveltoenrolin == 'Grade 10'){

        $present_g10++;

    }

    if($student->gradeleveltoenrolin == 'Grade 11'){

        $present_g11++;

        if($student->strandtoenrolin == 'HUMMS'){

        $present_humms++;

        }


        if($student->strandtoenrolin == 'GAS'){

        $present_gas++;

        }


        if($student->strandtoenrolin == 'TVL'){

        $present_tvl++;

        }


        if($student->strandtoenrolin == 'COOKERY'){

        $present_cookery++;

        }

        if($student->strandtoenrolin == 'STEM'){

        $present_stem++;

        }

        if($student->strandtoenrolin == 'ABM'){

        $present_abm++;

        }

    }

    if($student->gradeleveltoenrolin == 'Grade 12'){
     
        $present_g12++;

            if($student->strandtoenrolin == 'HUMMS'){

        $present_humms++;

        }


        if($student->strandtoenrolin == 'GAS'){

        $present_gas++;

        }


        if($student->strandtoenrolin == 'TVL'){

        $present_tvl++;

        }


        if($student->strandtoenrolin == 'COOKERY'){

        $present_cookery++;

        }

        if($student->strandtoenrolin == 'STEM'){

        $present_stem++;

        }

        if($student->strandtoenrolin == 'ABM'){

        $present_abm++;

        }

    }


}

//dd($present_g12++);

        return view('admin.statistics',[

        'past' => $past,
        'past_schoolyear' => $past_schoolyear,

        'past_g7' => $past_g7,
        'past_g8' => $past_g8,
        'past_g9' => $past_g9,
        'past_g10' => $past_g10,
        'past_g11' => $past_g11,
        'past_g12' => $past_g12,

        'past_gas' => $past_gas,
        'past_humms' => $past_humms,
        'past_tvl' => $past_tvl,
        'past_cookery' => $past_cookery,
        'past_ict' => $past_ict,
        'past_abm' => $past_abm,
        'past_stem' => $past_stem,

        'present' => $present,
        'present_schoolyear' => $past_schoolyear,

        'present_gas' => $present_gas,
        'present_humms' => $present_humms,
        'present_tvl' => $present_tvl,
        'present_cookery' => $present_cookery,
        'present_ict' => $present_ict,
        'present_abm' => $present_abm,
        'present_stem' => $present_stem,

        'present_g7' => $present_g7,
        'present_g8' => $present_g8,
        'present_g9' => $present_g9,
        'present_g10' => $present_g10,
        'present_g11' => $present_g11,
        'present_g12' => $present_g12,



        ]);
    }
}
