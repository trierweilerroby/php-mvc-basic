<?php
class Reply {
    private int $id;
    private string $title;
    private string $content;
    private string $reply_from;
    private string $reply_to;
    private int $article_id; 
	private int $accept;

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
	public function getReply_from(): string {
		return $this->reply_from;
	}
	
	/**
	 * @param string $reply_from 
	 * @return self
	 */
	public function setReply_from(string $reply_from): self {
		$this->reply_from = $reply_from;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getReply_to(): string {
		return $this->reply_to;
	}
	
	/**
	 * @param string $reply_to 
	 * @return self
	 */
	public function setReply_to(string $reply_to): self {
		$this->reply_to = $reply_to;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getArticle_id(): int {
		return $this->article_id;
	}
	
	/**
	 * @param int $article_id 
	 * @return self
	 */
	public function setArticle_id(int $article_id): self {
		$this->article_id = $article_id;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAccept(): int {
		return $this->accept;
	}
	
	/**
	 * @param int $accept 
	 * @return self
	 */
	public function setAccept(int $accept): self {
		$this->accept = $accept;
		return $this;
	}
}

?>