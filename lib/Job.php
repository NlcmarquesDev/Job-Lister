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
}
