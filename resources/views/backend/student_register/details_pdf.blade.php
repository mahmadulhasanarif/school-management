<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
    </style>
</head>
<body>

    <table id="customers">
    <tr>
        <td><h2>Dream School</h2></td>
        <td>
            <h2>School Management System</h2>
            <p>Address: Mirkandhapara, Ombikagonj</p>
            <p>Phone: +8801700-000000</p>
            <p>Email: support@erpbd.com</p>
        </td>
    </tr>
    </table>

    <table id="customers">
        <tr>
            <th width="10%">SL</th>
            <th  width="45%">Student Details</th>
            <th  width="45%">Student Data</th>
        </tr>

        <tr>
            <td>1</td>
            <td><b>Student Name</b></td>
            <td><b>{{$data->student->name}}</b></td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>Student ID No.</b></td>
            <td><b>{{$data->student->id_no}}</b></td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>Father Name</b></td>
            <td><b>{{$data->student->fname}}</b></td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>Mother Name</b></td>
            <td><b>{{$data->student->mname}}</b></td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>Address</b></td>
            <td><b>{{$data->student->address}}</b></td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>Roll</b></td>
            <td><b>{{$data->roll}}</b></td>
        </tr>
        <tr>
            <td>7</td>
            <td><b>Phone</b></td>
            <td><b>{{$data->student->phone}}</b></td>
        </tr>
        <tr>
            <td>8</td>
            <td><b>Gender</b></td>
            <td><b>{{$data->student->gender}}</b></td>
        </tr>
        <tr>
            <td>9</td>
            <td><b>Religion</b></td>
            <td><b>{{$data->student->religion}}</b></td>
        </tr>
        <tr>
            <td>10</td>
            <td><b>Discount</b></td>
            <td><b>{{$data->discount->discount}}</b></td>
        </tr>
        <tr>
            <td>11</td>
            <td><b>Class Name</b></td>
            <td><b>{{$data->studentClass->name}}</b></td>
        </tr>
        <tr>
            <td>12</td>
            <td><b>Group Name</b></td>
            <td><b>{{$data->studentGroup->name}}</b></td>
        </tr>
        <tr>
            <td>13</td>
            <td><b>Shift Name</b></td>
            <td><b>{{$data->studentShift->name}}</b></td>
        </tr>
        <tr>
            <td>14</td>
            <td><b>Year</b></td>
            <td><b>{{$data->studentYear->name}}</b></td>
        </tr>
        <tr>
            <td>15</td>
            <td><b>Dath Of Birth</b></td>
            <td><b>{{$data->student->dob}}</b></td>
        </tr>

    </table>

    <h3>Print Date: {{date("d-m-Y")}}</h3>

</body>
</html>