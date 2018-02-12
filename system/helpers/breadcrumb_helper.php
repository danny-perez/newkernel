<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('byte_format'))
{
	function breadcrumb()
	{
		$AddresStringUrl = $_SERVER['REQUEST_URI'];
		switch ($AddresStringUrl) {
			case '/':
					$breadcrumbString = '<a href="#">Главная</a>';
				break;
				case '/bible':
						$breadcrumbString = '<a href="#">Библия</a>';
					break;
					case '/sermon':
							$breadcrumbString = '<a href="#">Проповеди</a>';
						break;
						case '/exegesis':
								$breadcrumbString = '<a href="#">Толкования</a>';
							break;
							case '/dictionaries':
									$breadcrumbString = '<a href="#">Словари</a>';
								break;
								case '/maps':
										$breadcrumbString = '<a href="#">Карты</a>';
									break;
									case '/medialib':
											$breadcrumbString = '<a href="#">Медиатека</a>';
										break;
										case '/history':
												$breadcrumbString = 'О проекте&ensp;/&ensp;История проекта';
											break;
											case '/authors':
													$breadcrumbString = 'О проекте&ensp;/&ensp;Авторы';
												break;
												case '/real_history':
														$breadcrumbString = 'О проекте&ensp;/&ensp;Реальная история';
													break;
													case '/donations':
															$breadcrumbString = 'О проекте&ensp;/&ensp;Пожертвования';
														break;
		}
		return $breadcrumbString;
	}
}
