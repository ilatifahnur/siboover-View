@extends('template.driver')

@section('title', 'Trips')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('trips');?>" class="breadcrumb">UPDATE TRIPS</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s6 offset-s3">
        <div style="background-color: #66ff66;">
            @if (!empty($success))
                {{$success}}
            @endif
        </div>
        <form action="trips" method="post">
            <div class="row">
                <div class="input-field">
                    <input id="distance" type="number" class="validate" name="distance" required>
                    <label for="distance">Jarak Tempuh Kendaraan (km)</label>
                </div>
            </div>
            <div class="row center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>
        </form>
        <br>
        <table class="col s12">
        <thead>
            <tr>
                <td colspan="5" style="text-align:center;">
                    <div style = "background:rgba(161, 255, 157, 0.6);" class="input-field">
                            @if (!empty($success))
                                {{$success}}
                            @endif
                    </div>
                </td>
            </tr>
            <tr>
                <th data-field="date">Tanggal dan Waktu</th>
                <th data-field="jenis">Jenis Maintenance</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $jadwal = DB::table('maintenance')->get();
                foreach ($jadwal as $jadwal_maintenance){
                    echo "<tr>";
                    
                        echo "<td>".$jadwal_maintenance->tanggal_waktu."</td>";
                        echo "<td>".$jadwal_maintenance->jenis."</td>";
                        echo '<td><a class="btn waves-effect waves-light" href="'.URL::route('upload', ['idmaintenance' => $jadwal_maintenance->Id]).'"?>Upload Invoice</a></td>';          
                        //echo "<td><a class='waves-effect waves-teal btn-flat' style='padding:0; text-transform:none;'>Bukti</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
</div>
@endsection