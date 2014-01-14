<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.txt that was distributed with this source code.
 */

namespace Kdyby\Doctrine\Types;

use Doctrine;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Kdyby;
use Nette;



/**
 * @author Ladislav Marek <ladislav@marek.su>
 */
class InternetAddress extends Kdyby\Doctrine\DbalType
{

	/**
	 * @param array $fieldDeclaration
	 * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
	 *
	 * @throws \Kdyby\Doctrine\InvalidStateException
	 * @return mixed
	 */
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
	{
		return 'VARBINARY(16)';
	}



	/**
	 * @return string
	 */
	public function getName()
	{
		return self::INTERNET_ADDRESS;
	}



	/**
	 * @param mixed
	 * @param AbstractPlatform
	 * @return mixed
	 */
	public function convertToDatabaseValue($value, AbstractPlatform $platform)
	{
		return $value === NULL ? NULL : inet_pton($value);
	}



	/**
	 * @param mixed
	 * @param AbstractPlatform
	 * @return mixed
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform)
	{
		return $value === NULL ? NULL : inet_ntop($value);
	}

}
