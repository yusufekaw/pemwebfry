<?php
namespace App\Helpers;

class Day {
    
    public static function day_to_id($day) 
    {
        $hari;
        switch ($day) {
                	case 'Sunday':
                		$hari = 'Minggu';
                		break;
                	case 'Monday':
                		$hari = 'Senin';
                		break;
                	case 'Tuesday':
                		$hari = 'Selasa';
                		break;
					case 'Wednesday':
                		$hari = 'Rabu';
                		break;
                	case 'Thursday':
                		$hari = 'Kamis';
                		break;
                	case 'Friday':
                		$hari = 'Jumat';
                		break;
                	case 'Saturday':
                		$hari = 'Sabtu';
                		break;	                	
                	default:
                		# code...
                		break;
                }
		return $hari;       
    }

    public static function day_order($day)
    {
        $order;
        switch ($day) {
                    case 'senin':
                       $order = 1;
                        break;
                    case 'selasa':
                       $order = 2;
                        break;
                    case 'rabu':
                       $order = 3;
                        break;
                    case 'kamis':
                       $order = 4;
                        break;
                    case 'jumat':
                       $order = 5;
                        break;
                    case 'sabtu':
                       $order = 6;
                        break;
                    case 'minggu':
                       $order = 7;
                        break;                      
                    default:
                        # code...
                        break;
                }
        return $order; 
    }
}