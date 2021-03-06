@extends('template.finance')

@section('title', 'Manage Vehicle')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('managevehiclef');?>" class="breadcrumb">MAINTENANCE HISTORY</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <table class="col s8 offset-s2">
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
                <th data-field="driver">Driver</th>
                <th data-field="kendaraan">Kendaraan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $jadwal = DB::table('maintenance')->get();
                foreach ($jadwal as $jadwal_maintenance){
                    echo "<tr>";
                    
                        echo "<td>".$jadwal_maintenance->tanggal_waktu."</td>";
                        echo "<td>".$jadwal_maintenance->jenis."</td>";
                        $drivers= DB::table('driver')->get();
                        foreach ($drivers as $driver) {
                            if($driver->nomorpolisi == $jadwal_maintenance->nomorpolisi){
                              
                              $users = DB::table('user')->select('nama')->where("Username", "=", $driver->username)->get();
                                echo "<td>".$driver->username."</td>";      
                              
                            }
                        }
                        
                        echo "<td>".$jadwal_maintenance->nomorpolisi."</td>";
                        
                        //echo "<td><a class='waves-effect waves-teal btn-flat' style='padding:0; text-transform:none;'>Bukti</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<div class="row center-align">
    <a class="waves-effect waves-light btn" href="<?=URL::route('addmaintenance');?>">Tambahkan Jadwal Maintenance</a>
</div>
@endsection