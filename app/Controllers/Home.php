<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// 엑셀 다운로드
		$this->excelExport();

		return view('welcome_message');
	}

	// 엑셀 다운로드
	public function excelExport()
	{
		$fileName = "매출 보고서.xls";
		// $fileName = "매출 보고서.doc";
		// $fileName = "매출 보고서.pdf";
		// $fileName = "매출 보고서.csv";
		$column_arr = [
			'월', '매출'
		];
		$logs = [
			[1, 1000],
			[2, 30000]
		];

		
		print("<meta http-equiv=\"Content-Type\" content=\"application/vnd.ms-excel; charset=utf-8\">");
		header("Content-Disposition: attachment; filename=" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
		// header("Content-Type: application/msword");
		// header("Content-Type: application/pdf");
		// header("Content-Type: text/csv");
        echo "<table border='2' bordercolor='red' align='left' bgcolor='skyblue'><caption>1월</caption><tr>";

        foreach ($column_arr as $val) {
            echo "<th colspan='1'>" . $val . "</th>";
			echo "<th colspan='2'>" . $val . "</th>";
        }

        echo "</tr>";
        foreach ($logs as $key => $val) {
            echo "
                <tr>
                    <td rowspan='2' align='left'>" . $val[0] . "</td>
                    <td>" . $val[0] . "</td>
                    <td>" . $val[1] . "</td>
                    <td>" . $val[1] . "</td>
                </tr>
            ";
        }
        echo "</table>";


        echo "<p>2월</p><table><colgroup span='4'><col><col span='3'></colgroup><tr>";

        foreach ($column_arr as $val) {
            echo "<th colspan='1'>" . $val . "</th>";
			echo "<th colspan='2'>" . $val . "</th>";
        }

        echo "</tr>";
        foreach ($logs as $key => $val) {
            echo "
                <tr>
                    <td>" . $val[0] . "</td>
                    <td>" . $val[0] . "</td>
                    <td>" . $val[1] . "</td>
                    <td>" . $val[1] . "</td>
                </tr>
            ";
        }
        echo "</table>";
        exit;
	}
}
