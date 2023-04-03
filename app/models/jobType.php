<?php
class JobType
{
    private int $id;
    private string $job_type;

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
	public function getJob_type(): string {
		return $this->job_type;
	}
	
	/**
	 * @param string $job_type 
	 * @return self
	 */
	public function setJob_type(string $job_type): self {
		$this->job_type = $job_type;
		return $this;
	}
}