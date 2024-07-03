<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ChildPDFController extends Controller
{
    public function generateChildCardPDF(int $id) {
        $child = Child::findOrFail($id);
        set_time_limit(300);

        $pdf = PDF::loadView('childPDF.childCard', compact('child'))
            ->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->download($child->full_name . "'s card.pdf");
    }

      public function generateChildrenListPDF(int $year)
    {
        $child = Child::findOrFail($year);
        set_time_limit(300);

        $pdf = PDF::loadView('childPDF.childCard', compact('child'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);

        return $pdf->download($child->full_name . "'s card.pdf");
    }
}
