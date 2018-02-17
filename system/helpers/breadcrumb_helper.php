<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('byte_format'))
{
	function breadcrumb()
	{
		$AddresStringUrl = $_SERVER['REQUEST_URI'];
	if(strpos($AddresStringUrl,'?')>0){$cleanString=explode('?',$AddresStringUrl); $AddresStringUrl=$cleanString[0];}
		switch ($AddresStringUrl) {
			case '/':
					$breadcrumbString = '<a href="#">Главная</a>';
				break;
				case '/bible':
						$breadcrumbString = 'Библия';
					break;
					case '/sermon':
							$breadcrumbString = 'Проповеди';
						break;
						case '/exegesis':
								$breadcrumbString = 'Толкования';
							break;
							case '/dictionaries':
									$breadcrumbString = 'Словари';
								break;
								case '/maps':
										$breadcrumbString = 'Карты';
									break;
									case '/medialib':
											$breadcrumbString = 'Медиатека';
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
														case '/newtestament':
																$breadcrumbString = '<a href="/bible">Библия</a>&ensp;/&ensp;Новый Завет';
															break;
															case '/oldtestament':
																	$breadcrumbString = '<a href="/bible">Библия</a>&ensp;/&ensp;Ветхий Завет';
																break;
            default:
                $breadcrumbString = 'Не определено';
		}
		return $breadcrumbString;
	}
}
