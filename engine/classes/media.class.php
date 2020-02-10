<?php

/**
* 
*/
class Media
{
	private static
		$_media = null;
	
	function __construct(){}


	public static function getList( $type = 'list', $by = 'id' )
	{
		//if ( self::$_media == null )
		//{
			$result = Db::db_select('media',null,null,'id');
			if ( $result )
			{
				foreach ($result as $key => $value)
				{
					//var_dump( $value['src'] );
					//$value['src'] = ( $value['src'] == null ? '/' . IMAGE_URI : $value['src'] );
					self::$_media[ $value['type'] ][$key] = $value;
					self::$_media['list']['id'][$key] = $value;
					self::$_media['list']['name'][$value['name']] = $value;
				}
			}
			else
			{
				self::$_media = false;
			}
		//}

		$return = self::$_media;

		if ( isset( $return[$type] ) )
		{
			$return = $return[$type];

			if ( $type == 'list' )
			{
				if ( isset( $return[$by] ) )
				{
					$return = $return[$by];
				}
				else
				{
					$return = false;
				}
			}
		}
		else
		{
			$return = false;
		}

		return $return;
	}



	public static function get( $idname, $property = null )
	{
		if ( (string) $idname === (string) (int) $idname )
		{
			$id = (int) $idname;
			$list = self::getList();
		}
		else
		{
			$id = $idname;
			$list = self::getList('list', 'name');
		}

		if ( isset( $list[$id] ) )
		{
			$return = $list[$id];

			if ( $property !== null )
			{
				if ( isset( $return[$property] ) )
				{
					$return = $return[$property];
				}
				else
				{
					$return = false;
				}
			}
		}
		else
		{
			$return = false;
		}

		return $return;
	}



	public static function getUri( $idname, $size = 'full' )
	{
		if ( !$size )
		{
			$size = 'full';
		}
		$item = self::get( $idname );

		if ( $item )
		{
			if ( $item['src'] === null )
			{
				$sub_dir = $item['type'] . '/';
				if ( $item['type'] == 'image' )
				{
					$sub_dir .= $size . '/';
				}
				$return = '/' . MEDIA_URI . $sub_dir . $item['name'] . '.' . $item['extension'];
				
			}
			else
			{
				$return = $item['src'];
			}
		}
		else
		{
			$return = false;
		}
		return $return;
	}



	public static function getGallery( $idname, $size = 'full' )
	{
		$parent =  post::get($idname, 'id');
		$list = self::getList();
		$return = false;
		if ( is_array($list) )
		{
			foreach ($list as $key => $item) {
				if ( $item['parent'] == $parent )
				{
					$return[$key] = $item;
					$return[$key]['src'] = self::getUri( $item['id'], $size );
				}
			}
			return $return;
		}
	}




	/*public static function getImage($id, $property=null)
	{
		$id = (int) $id;
		if ( !isset( self::$_images[$id] ) )
		{
			$result = Db::db_select('media', ['id'=>$id, 'type'=>'image']);
			if ( $result )
			{
				$result = $result[0];

				if ( $result['src'] != null )
				{
					$src = rtrim( $result['src'] ) . '/' . $result['name'] ;
				}
				else
				{
					$src = '/' . IMAGE_URI . $result['name'];
				}
				$result['src'] = $src;

				self::$_images[$id] = $result;

			}
			else
			{
				self::$_images[$id] = false;
			}
		}
		$return = self::$_images[$id];

		if ( $property != null)
		{
			if ( isset( $return[$property] ) )
			{
				$return = $return[$property];
			}
			else
			{
				$return = false;
			}
		}
		return $return;
	}*/
}