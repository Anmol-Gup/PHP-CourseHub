<?php
    require 'connection.php';
    class Courses{
        
        private $connection;
        private $courses;

        function __construct()
        {
            $this->connection=connect_db(); 
        }
        function GetCourseByCategory($category)
        {
            if($category==='All')
                $selectquery='SELECT * FROM courses';
            else
                $selectquery="SELECT * FROM courses WHERE category='$category'";
            
            $result=$this->connection->query($selectquery);
            
            if($result->num_rows)
            {
                $this->courses=$result->fetch_all();
                return $this->courses;
            }
        }
    }

    $course=new Courses();
    $data=file_get_contents('php://input');
    $data=json_decode($data,true);
    
    if($data['function']==='GetCourseByCategory')
    {
        $result=json_encode($course->GetCourseByCategory($data['category']));
        print_r($result);
    }
?>