<?php namespace Project\Presenters;


abstract class Presenter {

	/**
	 * The model entity
	 *
	 * @var Model
	 */
	protected $entity;

	/**
	 * Construct a presenter with a Model
	 *
	 * @param Model $entity
	 *
	 * @return self
	 */
	public function __construct($entity)
	{
		$this->entity = $entity;
	}

	/*
	 * Get a property by name
	 *
	 * @param string $property
	 *
	 * @return string
	 */
	public function __get($property)
	{
		if (method_exists($this, $property))
		{
			return $this->{$property}();
		}

		return $this->entity->{$property};
	}

} 