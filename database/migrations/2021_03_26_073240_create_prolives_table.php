<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProlivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prolives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('price')->nullable();
            $table->longText('description')->nullable();
            $table->longText('level')->nullable();
            $table->longText('celendar')->nullable()->default('<table border="1" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>&nbsp;</td>
			<td>Monday</td>
			<td>Tueday</td>
			<td>Wednesday</td>
			<td>Thursday</td>
			<td>Friday</td>
			<td>Satuday</td>
			<td>Sunday</td>
		</tr>
		<tr>
			<td>S&aacute;ng</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Chiều</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Tối</td>
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
            ');
            $table->longText('salary')->nullable('<table id="salary" border="1" cellpadding="0" cellspacing="0" style="width:500px">
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
');
            $table->longText('video')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prolifes');
    }
}
