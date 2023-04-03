<?php
class UserType
{

    private int $type_id;
    private string $user_type;


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
	public function getUser_type(): string {
		return $this->user_type;
	}
	
	/**
	 * @param string $user_type 
	 * @return self
	 */
	public function setUser_type(string $user_type): self {
		$this->user_type = $user_type;
		return $this;
	}
}