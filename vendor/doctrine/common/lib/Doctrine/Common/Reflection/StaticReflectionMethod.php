<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */
namespace Doctrine\Common\Reflection;

use ReflectionException;
use ReflectionMethod;

class StaticReflectionMethod extends ReflectionMethod
{

    /**
     * The PSR-0 parser object.
     *
     * @var StaticReflectionParser
     */
    protected $staticReflectionParser;

    /**
     * The name of the method.
     *
     * @var string
     */
    protected $methodName;

    /**
     *
     * @param StaticReflectionParser $staticReflectionParser
     * @param string $methodName
     */
    public function __construct(StaticReflectionParser $staticReflectionParser, $methodName)
    {
        $this->staticReflectionParser = $staticReflectionParser;
        $this->methodName = $methodName;
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->methodName;
    }

    /**
     *
     * @return StaticReflectionParser
     */
    protected function getStaticReflectionParser()
    {
        return $this->staticReflectionParser->getStaticReflectionParserForDeclaringClass('method', $this->methodName);
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getDeclaringClass()
    {
        return $this->getStaticReflectionParser()->getReflectionClass();
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getNamespaceName()
    {
        return $this->getStaticReflectionParser()->getNamespaceName();
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getDocComment()
    {
        return $this->getStaticReflectionParser()->getDocComment('method', $this->methodName);
    }

    /**
     *
     * @return array
     */
    public function getUseStatements()
    {
        return $this->getStaticReflectionParser()->getUseStatements();
    }

    /**
     *
     * {@inheritdoc}
     */
    public static function export($class, $name, $return = false)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getClosure($object)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getModifiers()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getPrototype()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function invoke($object, $parameter = null)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function invokeArgs($object, array $args)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isAbstract()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isConstructor()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isDestructor()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isFinal()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isPrivate()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isProtected()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isPublic()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isStatic()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function setAccessible($accessible)
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function __toString()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getClosureThis()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getEndLine()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getExtension()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getExtensionName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getFileName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getNumberOfParameters()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getNumberOfRequiredParameters()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getParameters()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getShortName()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getStartLine()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getStaticVariables()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function inNamespace()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isClosure()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isDeprecated()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isInternal()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isUserDefined()
    {
        throw new ReflectionException('Method not implemented');
    }

    /**
     *
     * {@inheritdoc}
     */
    public function returnsReference()
    {
        throw new ReflectionException('Method not implemented');
    }
}
