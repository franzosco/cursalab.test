<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Registration;

class RankedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile' =>  ['required', Rule::exists(Profile::class, 'id')],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $args = $validator->validated();

        $columns = [
            'registrations.student_id',
            'students.first_name',
            'students.last_name',
            DB::raw('@score := AVG(score) AS score'),
            DB::raw('@approved := COUNT(approval_date) AS approved'),
            DB::raw('@attempts := SUM(attempts) AS attempts'),
            DB::raw('@diffdate := DATEDIFF(NOW(), approval_date) AS diffdate'),
            DB::raw('(select (@score + @approved) - (@attempts - @approved) + (1 / (@diffdate + 1))) AS weighted'),
        ];

        $data = Registration::query()
            ->select($columns)
            ->join('students', 'students.id', '=', 'registrations.student_id')
            ->join('cources', 'cources.id', '=', 'registrations.cource_id')
            ->groupBy(['student_id', 'first_name', 'last_name', 'diffdate', 'weighted'])
            ->where('cources.profile_id', $args['profile'])
            ->orderBy('weighted')
            ->get();

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
    }
}
