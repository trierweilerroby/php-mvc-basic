<?php
class User
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private int $type_id;
    private string $password;
    private int $job_type;
    private string $job_name;
    private ?string $certificate;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname 
     * @return self
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname 
     * @return self
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email 
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password 
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }



	/**
	 * @return int
	 */
	public function getType_id(): int {
		return $this->type_id;
	}
	
	/**
	 * @param int $type_id 
	 * @return self
	 */
	public function setType_id(int $type_id): self {
		$this->type_id = $type_id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCertificate(): string {
		return $this->certificate;
	}
	
	/**
	 * @param string $certificate 
	 * @return self
	 */
	public function setCertificate(string $certificate): self {
		$this->certificate = $certificate;
		return $this;
	}

	public function getJob_type(): int {
		return $this->job_type;
	}
	
	/**
	 * @param int $job_type 
	 * @return self
	 */
	public function setJob_type(int $job_type): self {
		$this->job_type = $job_type;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getJob_name(): string {
		return $this->job_name;
	}
	
	/**
	 * @param string $job_name 
	 * @return self
	 */
	public function setJob_name(string $job_name): self {
		$this->job_name = $job_name;
		return $this;
	}
}
?>