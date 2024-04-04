<?php

class Job
{
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }
    // get all jobs
    public function getAllJobs()
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
                        From jobs
                        INNER JOIN categories
                        ON jobs.category_id = categories.id
                        ORDER BY post_date DESC");
        // $this->db->query("SELECT * FROM jobs");

        //assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM categories");
        // $this->db->query("SELECT * FROM jobs");

        //assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
    public function getByCategory($category)
    {
        $this->db->query("SELECT jobs.*, categories.name AS cname 
        From jobs
        INNER JOIN categories
        ON jobs.category_id = categories.id
        WHERE jobs.category_id = $category
        ORDER BY post_date DESC");
        //assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
    public function getCategory($category)
    {
        $this->db->query("SELECT name FROM categories 
        WHERE categories.id = $category");
        // $this->db->query("SELECT * FROM jobs");

        //assign Result Set
        $results = $this->db->resultSet();
        // var_dump($results);

        return $results[0]->name;
    }

    public function getJob($job_id)
    {
        $this->db->query("SELECT * FROM jobs 
        WHERE jobs.id = $job_id");
        // $this->db->query("SELECT * FROM jobs");

        //assign Result Set
        $results = $this->db->resultSet();
        // var_dump($results);

        return $results[0];
    }
    //Create Job
    public function create($data)
    {
        // $this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email) VALUES (:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)");
        // //Bind Data
        // $this->db->bind(':category_id', $data['category_id']);
        // $this->db->bind(':job_title', $data['job_title']);
        // $this->db->bind(':company', $data['company']);
        // $this->db->bind(':description', $data['description']);
        // $this->db->bind(':location', $data['location']);
        // $this->db->bind(':salary', $data['salary']);
        // $this->db->bind(':contact_user', $data['contact_user']);
        // $this->db->bind(':contact_email', $data['contact_email']);
        $sql = "INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email)
                VALUES (:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)";


        $this->db->query($sql);

        $this->db->bind(':category_id', $data['category_id'], PDO::PARAM_INT); // Ensure integer for category_id (if applicable)
        $this->db->bind(':job_title', $data['job_title'], PDO::PARAM_STR);
        $this->db->bind(':description', $data['description'], PDO::PARAM_STR);
        $this->db->bind(':location', $data['location'], PDO::PARAM_STR);
        $this->db->bind(':salary', $data['salary'], PDO::PARAM_STR); // Assuming salary is stored as a string
        $this->db->bind(':contact_user', $data['contact_user'], PDO::PARAM_STR);
        $this->db->bind(':contact_email', $data['contact_email'], PDO::PARAM_STR);

        if ($this->db->execute()) {
            var_dump($data);

            return true;
        } else {
            return false;
        }
    }
}
