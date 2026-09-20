<?php
namespace Database\Seeders;
use App\Models\Inventory; use App\Models\Schedule; use App\Models\Service; use App\Models\User; use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder { public function run(): void {
  $owner=User::factory()->create(['name'=>'Korina','email'=>'owner@korina.test','role'=>'owner']);
  $staff=User::factory()->create(['name'=>'Mika Santos','email'=>'mika@korina.test','role'=>'staff']);
  foreach ([['Regular Color with Brazilian Keratin',699],['Organique Color with Brazilian Keratin',799],['Branded Color with Brazilian Keratin',999],['Regular Color with Hair Botox',799],['Organique Color with Hair Botox',999],['Branded Color with Hair Botox',1299],['Regular Rebond with Regular Color Free Botox',1599],['Organique Rebond with Organique Color Free Botox',1799],['Branded Rebond with Branded Color Free Hair Botox',1999],['Regular Rebond with Regular Balayage Free Botox',2500],['Organique Rebond with Organique Balayage Free Botox',3000],['Branded Rebond with Branded Balayage Free Hair Botox',3500]] as [$name,$price]) Service::create(['name'=>$name,'category'=>'Hair','price'=>$price,'duration'=>180,'commission_rate'=>30]);
  foreach ([['Keratin Treatment','Hair',4,5],['Hair Color','Hair',12,8],['Nail Polish','Nail',18,10],['Facial Serum','Skin',3,5]] as [$name,$category,$quantity,$level]) Inventory::create(compact('name','category','quantity')+['reorder_level'=>$level,'supplier'=>'Salon Supply Co.']);
  Schedule::create(['staff_id'=>$staff->id,'shift_date'=>today(),'shift_start'=>'09:00','shift_end'=>'18:00','status'=>'Regular']);
} }
