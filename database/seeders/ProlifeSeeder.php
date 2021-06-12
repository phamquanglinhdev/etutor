<?php


namespace Database\Seeders;


use App\Models\Prolife;
use Illuminate\Database\Seeder;

class ProlifeSeeder extends Seeder
{
    public function run()
    {
        for ($i = 2; $i <= 11; $i++) {
            $prolife = [
                'user_id' => $i,
                'level' => "<p>IELTS " . rand(5, 9) . "." . rand(0, 5)."</p><p>Hi! My name is Monique, but you can call me teacher Nik. I am 24 years old and I live in the Philippines. I have been an Online English teacher for 2 years now. Learning the English language is very crucial. It could help us in numerous ways…</p>",
                'celendar' =>
                    '<table border="1" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>&nbsp;</td>
			<th>Mon</th>
			<th>Tue</th>
			<th>Wed</th>
			<th>Thu</th>
			<th>Fri</th>
			<th>Sat</th>
			<th>Sun</th>
		</tr>
		<tr>
			<th>Mor</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>Aft</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th>Eve</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
',
                'salary'=>'<table id="salary" border="1" cellpadding="0" cellspacing="0" style="width:500px">
	<thead>
		<tr>
			<th scope="row">Số giờ đăng k&yacute;</th>
			<th scope="col">Học ph&iacute;/Giờ</th>
			<th scope="col">Tổng học ph&iacute;</th>
			<th class="sub" scope="col">Ghi ch&uacute;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td rowspan="3">&nbsp;</td>
		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

		</tr>
		<tr>
			<th scope="row">&nbsp;</th>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
',
                'description'=>'<p>Tốt nghiệp Havard</p><p>Chúng chỉ Toeic 800</p>',
                'video'=>'<iframe width="1280" height="720" src="https://www.youtube.com/embed/2RTq6JBYq9g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'];
            Prolife::create($prolife);
        }
    }
}
