<?php

namespace App;

class Example
{
//    protected $foo;
//
//    /**
//     * Example constructor.
//     * @param $foo
//     */
//    public  function __construct($foo)
//    {
//        $this->foo = $foo;
//    }
//	public function go()
//	{
//		dump('it works!');
//	}

    protected $collaborator;

    /**
     * Example constructor
     * @param $collaborator
     */
    public function __construct(Collaborator $collaborator)
    {
        $this->collaborator = $collaborator;
    }
}
