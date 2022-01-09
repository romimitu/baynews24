<?php

use Illuminate\Support\Facades\DB;
use App\Transact;
use App\ChartOfAccount;
use Illuminate\Http\Request;

class Bengali
{
    // Numbers
    public static $bn_numbers = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
    public static $en_numbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

    // Months
    public static $en_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    public static $en_short_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    public static $bn_months = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    // Days
    public static $en_days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    public static $en_short_days = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
    public static $bn_short_days = ['শনি', 'রবি', 'সোম', 'মঙ্গল', 'বুধ', 'বৃহঃ', 'শুক্র'];
    public static $bn_days = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];

    // Times
    public static $en_times = array('am', 'pm');
    public static $en_times_uppercase = array('AM', 'PM');
    public static $bn_times = array('পূর্বাহ্ন', 'অপরাহ্ন');

    // Method - English to Bengali Number
    public static function bn_number($number)
    {
        return str_replace(self::$en_numbers, self::$bn_numbers, $number);
    }

    // Method - Bengali to English Number
    public static function en_number($number)
    {
        return str_replace(self::$bn_numbers, self::$en_numbers, $number);
    }

    // Method - English to Bengali Date
    public static function bn_date($date)
    {
        // Convert Numbers
        $date = str_replace(self::$en_numbers, self::$bn_numbers, $date);

        // Convert Months
        $date = str_replace(self::$en_months, self::$bn_months, $date);
        $date = str_replace(self::$en_short_months, self::$bn_months, $date);

        // Convert Days
        $date = str_replace(self::$en_days, self::$bn_days, $date);
        $date = str_replace(self::$en_short_days, self::$bn_short_days, $date);
        $date = str_replace(self::$en_days, self::$bn_days, $date);
        return $date;
    }

    // Method - English to Bengali Time
    public static function bn_time($time)
    {
        // Convert Numbers
        $time = str_replace(self::$en_numbers, self::$bn_numbers, $time);

        // Convert Time
        $time = str_replace(self::$en_times, self::$bn_times, $time);
        $time = str_replace(self::$en_times_uppercase, self::$bn_times, $time);
        return $time;
    }

    // Method - English to Bengali Date Time
    public static function bn_date_time($date_time)
    {
        // Convert Numbers
        $date_time = str_replace(self::$en_numbers, self::$bn_numbers, $date_time);

        // Convert Months
        $date_time = str_replace(self::$en_months, self::$bn_months, $date_time);
        $date_time = str_replace(self::$en_short_months, self::$bn_months, $date_time);

        // Convert Days
        $date_time = str_replace(self::$en_days, self::$bn_days, $date_time);
        $date_time = str_replace(self::$en_short_days, self::$bn_short_days, $date_time);
        $date_time = str_replace(self::$en_days, self::$bn_days, $date_time);

        // Convert Time
        $date_time = str_replace(self::$en_times, self::$bn_times, $date_time);
        $date_time = str_replace(self::$en_times_uppercase, self::$bn_times, $date_time);
        return $date_time;
    }
}


function rowList($array,$arraykey)
{

    return (($array->currentPage()-1) * $array->perPage() + $arraykey + 1);
}

function uploadFile($file,$request,$path='',$title='')
{
    if($request->$file!=null)
    {
        $fileName = str_slug($title,'-').'-'.time() . '-' . $request->$file->getClientOriginalName();
        $request->$file->move(public_path($path), $fileName);
        return $path.$fileName;
    }
}
function uploadFileWithCrop($file,$request,$path='',$title='')
{
    if($request->$file!=null)
    {
        $fileName = str_slug($title,'-').'-'.time() . '-' . $request->$file->getClientOriginalName();
        $height = 413;
        $img = Image::make($request->$file)->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->insert(public_path('frontend/img/watermarklogo.png'), 'bottom-right', 10, 10);
        $img->save(public_path($path).$fileName);
        return $path.$fileName;
    }
}
function make_slug($string) {
    return preg_replace('/\s+/u', '-', trim($string));
}


class BanglaDate {

    private $timestamp; //timestamp as input
    private $morning; //when the date will change?
    private $engHour; //Current hour of English Date
    private $engDate; //Current date of English Date
    private $engMonth; //Current month of English Date
    private $engYear; //Current year of English Date
    private $bangDate; //generated Bangla Date
    private $bangMonth; //generated Bangla Month
    private $bangYear; //generated Bangla   Year

    private $bn_months = array("পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র", "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন", "কার্তিক", "অগ্রহায়ণ");
    private $bn_month_dates = array(30,30,30,30,31,31,31,31,31,30,30,30);
    private $bn_month_middate = array(13,12,14,13,14,14,15,15,15,15,14,14); 
    private $lipyearindex = 3;

    function __construct( $timestamp, $hour = 6 ) {
        $this->BanglaDate( $timestamp, $hour );
    }

    function BanglaDate( $timestamp, $hour = 6 ) {
        $this->engDate = date( 'd', $timestamp );
        $this->engMonth = date( 'm', $timestamp );
        $this->engYear = date( 'Y', $timestamp );
        $this->morning = $hour;
        $this->engHour = date( 'G', $timestamp );

        //calculate the bangla date
        $this->calculate_date();

        //now call calculate_year for setting the bangla year
        $this->calculate_year();

        //convert english numbers to Bangla
        $this->convert();
    }

    function set_time( $timestamp, $hour = 6 ) {
        $this->BanglaDate( $timestamp, $hour );
    }

    /**
     * Calculate the Bangla date and month
     *
     * @access private
     */
    private function calculate_date() {     
        $this->bangDate = $this->engDate - $this->bn_month_middate[$this->engMonth - 1];
        if ($this->engHour < $this->morning) 
            $this->bangDate -= 1;
        
        if (($this->engDate <= $this->bn_month_middate[$this->engMonth - 1]) || ($this->engDate == $this->bn_month_middate[$this->engMonth - 1] + 1 && $this->engHour < $this->morning) ) {
            $this->bangDate += $this->bn_month_dates[$this->engMonth - 1];
            if ($this->is_leapyear() && $this->lipyearindex == $this->engMonth) 
                $this->bangDate += 1;
            $this->bangMonth = $this->bn_months[$this->engMonth - 1];
        }
        else{
            $this->bangMonth = $this->bn_months[($this->engMonth)%12];      
        }
    }

    function is_leapyear() {
        if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
            return true;
        else
            return false;
    }

    function calculate_year() {
        $this->bangYear = $this->engYear - 593;
        if (($this->engMonth < 4) || (($this->engMonth == 4) && (($this->engDate < 14) || ($this->engDate == 14 && $this->engHour < $this->morning))))
            $this->bangYear -= 1;
    }

    function bangla_number( $int ) {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');

        $converted = str_replace( $engNumber, $bangNumber, $int );
        return $converted;
    }

    function convert() {
        $this->bangDate = $this->bangla_number( $this->bangDate );
        $this->bangYear = $this->bangla_number( $this->bangYear );
    }

    function get_date() {
        return array($this->bangDate, $this->bangMonth, $this->bangYear);
    }

}
function getBnDate() {
    $bn_date = new BanglaDate( time() );
    $date = $bn_date->get_date();
    return $date;
}