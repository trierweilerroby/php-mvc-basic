<?php
class Article {

    public int $id;
    public string $title;
    public string $content;
    public int $author;
    public string $posted_at;
	public int $salary; 

	public string $author_lastname;
	
	public string $author_firstname;

	// Getters and setters generated using https://docs.devsense.com/en/vscode/editor/code-actions

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getContent(): string {
		return $this->content;
	}
	
	/**
	 * @param string $content 
	 * @return self
	 */
	public function setContent(string $content): self {
		$this->content = $content;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPosted_at(): string {
		return $this->posted_at;
	}
	
	/**
	 * @param string $posted_at 
	 * @return self
	 */
	public function setPosted_at(string $posted_at): self {
		$this->posted_at = $posted_at;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getSalary(): int {
		return $this->salary;
	}
	
	/**
	 * @param int $salary 
	 * @return self
	 */
	public function setSalary(int $salary): self {
		$this->salary = $salary;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAuthor(): int {
		return $this->author;
	}
	
	/**
	 * @param int $author 
	 * @return self
	 */
	public function setAuthor(int $author): self {
		$this->author = $author;
		return $this;
	}



	/**
	 * @return string
	 */
	public function getAuthor_lastname(): string {
		return $this->author_lastname;
	}
	
	/**
	 * @param string $author_lastname 
	 * @return self
	 */
	public function setAuthor_lastname(string $author_lastname): self {
		$this->author_lastname = $author_lastname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getAuthor_firstname(): string {
		return $this->author_firstname;
	}
	
	/**
	 * @param string $author_firstname 
	 * @return self
	 */
	public function setAuthor_firstname(string $author_firstname): self {
		$this->author_firstname = $author_firstname;
		return $this;
	}
}
