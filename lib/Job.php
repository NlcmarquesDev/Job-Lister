<?php

class Job
{
    private $db;

    public function __construct()
    {

        $this->db = new Database;
    }
    // get all jobs
    public function getAllJobs($start = 0)
    {

        $rows_per_page = 6;

        $this->db->query("SELECT jobs.*, categories.name AS cname 
                        From jobs
                        INNER JOIN categories
                        ON jobs.category_id = categories.id
                        ORDER BY post_date DESC 
                        LIMIT $start, $rows_per_page");
        // $this->db->query("SELECT * FROM jobs");

        //assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
    public function getPagination()
    {
        $this->db->query("SELECT * FROM jobs");
        $results = $this->db->resultSet();
        $nr_of_rows = count($results);

        $pages = ceil($nr_of_rows / 6);
        return $pages;
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
        $this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user, contact_email) VALUES (:category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email)");
        //Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        // $this->db->execute();

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $data)
    {
        $this->db->query("UPDATE jobs SET category_id = :category_id, job_title = :job_title, company = :company, description = :description, location = :location, salary = :salary,contact_user = :contact_user, contact_email = :contact_email WHERE id= $id");
        //Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {

        $this->db->query("DELETE FROM jobs WHERE id = $id");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
