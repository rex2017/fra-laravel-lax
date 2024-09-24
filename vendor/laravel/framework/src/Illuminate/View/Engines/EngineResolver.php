<?php
/**
 * 视图，引擎解析器
 */

namespace Illuminate\View\Engines;

use Closure;
use InvalidArgumentException;

class EngineResolver
{
    /**
     * The array of engine resolvers.
	 * 引擎解析器数组
     *
     * @var array
     */
    protected $resolvers = [];

    /**
     * The resolved engine instances.
	 * 已解析的引擎实例
     *
     * @var array
     */
    protected $resolved = [];

    /**
     * Register a new engine resolver.
	 * 注册新的引擎解析器
     *
     * The engine string typically corresponds to a file extension.
     *
     * @param  string  $engine
     * @param  \Closure  $resolver
     * @return void
     */
    public function register($engine, Closure $resolver)
    {
        unset($this->resolved[$engine]);

        $this->resolvers[$engine] = $resolver;
    }

    /**
     * Resolve an engine instance by name.
	 * 解析引擎实例按名称
     *
     * @param  string  $engine
     * @return \Illuminate\Contracts\View\Engine
     *
     * @throws \InvalidArgumentException
     */
    public function resolve($engine)
    {
        if (isset($this->resolved[$engine])) {
            return $this->resolved[$engine];
        }

        if (isset($this->resolvers[$engine])) {
            return $this->resolved[$engine] = call_user_func($this->resolvers[$engine]);
        }

        throw new InvalidArgumentException("Engine [{$engine}] not found.");
    }
}