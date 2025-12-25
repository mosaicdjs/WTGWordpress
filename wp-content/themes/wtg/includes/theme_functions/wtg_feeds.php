<?php
// feeds init
add_action('init', 'wtg_feeds_init');
/////////////

function wtg_feeds_init()
{
    add_feed('latestFeatures', 'wtg_latest_features_feed');
	add_feed('latestNews', 'wfd_latest_news_feed');
}

/////////////

// RSS feed functions

function wtg_latest_features_feed()
{
    $postCount = 3; // The number of posts to show in the feed
    $args = array(
        'post_type'             => 'features',
		'posts_per_page' 		=> 5,
        'orderby'               => 'post_date',
	);

    $articlesQuery = new WP_Query($args);
	
    header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
    echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
    ?>
    <rss version="2.0"
            xmlns:content="https://purl.org/rss/1.0/modules/content/"
            xmlns:dc="https://purl.org/dc/elements/1.1/"
            xmlns:atom="https://www.w3.org/2005/Atom"
            xmlns:sy="https://purl.org/rss/1.0/modules/syndication/"
            xmlns:slash="https://purl.org/rss/1.0/modules/slash/"
			xmlns:image="http://purl.org/rss/1.0/modules/image/"
			xmlns:blogChannel="http://backend.userland.com/blogChannelModule"
            <?php do_action('rss2_ns'); ?>>
    <channel>
            <title><?php bloginfo_rss('name'); ?> - Latest Features Feed</title>
            <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
            <link><?php bloginfo_rss('url') ?></link>
            <description><?php bloginfo_rss('description') ?></description>
            <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
            <language>en</language>
            <?php do_action('rss2_head'); ?>
            <?php while ($articlesQuery->have_posts()):$articlesQuery->the_post();

                $fID = get_the_ID();
                $title = apply_filters('the_title_rss',get_the_title($fID));
                $imageID = get_post_meta($fID, 'main_image',true);
                $imageDetails = wp_get_attachment_image_src( $imageID, 'large');
                //$imageDetails = wp_get_attachment_image_src( $imageID, 'thumb');
                $imagesrc = $imageDetails[0];
				$attachment = get_post( $imageID );
				$fileSize = filesize( get_attached_file( $imageID ) );
				$httpLink = str_replace('https://','http://',$imagesrc);
				
				$frontpage_id = get_option( 'page_on_front' );
				$frontImages = get_gallery_attachments($frontpage_id, 'home_carousel');
				$firstImage = $frontImages[0];
				$mainImageDetails = wp_get_attachment_image_src( $firstImage, 'large');
				$mainImageSrc = str_replace('https://','http://',$mainImageDetails[0]);
            ?>
                    <item>
                            <title><?php echo $title; ?></title> 
                            <link><?php the_permalink_rss(); ?></link>
                            <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
                            <guid isPermaLink="false"><?php the_guid(); ?></guid>
                            <description><![CDATA[<?php the_excerpt_rss();?>]]></description>
							<enclosure url="<?php echo $httpLink;?>" length="<?php echo $fileSize;?>" type="image/jpeg"></enclosure>
							
							
                            <content:encoded><![CDATA[<?php the_excerpt_rss(); ?>]]></content:encoded>
                            
                            <?php //do_action('rss2_item'); ?>
                    </item>
					<image>
						<title><?php echo $title; ?></title>
						<url><?php echo $mainImageSrc; ?></url>
						<link><?php the_permalink_rss(); ?></link>
					</image>
					
            <?php endwhile; ?>
            
    </channel>
    </rss>
    
    <?php
    
    
}


function wfd_latest_news_feed()
{

    header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
    echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
    ?>
    
    <rss version="2.0"
            xmlns:content="https://purl.org/rss/1.0/modules/content/"
            xmlns:dc="https://purl.org/dc/elements/1.1/"
            xmlns:atom="https://www.w3.org/2005/Atom"
            xmlns:sy="https://purl.org/rss/1.0/modules/syndication/"
            xmlns:slash="https://purl.org/rss/1.0/modules/slash/"
			xmlns:image="http://purl.org/rss/1.0/modules/image/"
			xmlns:blogChannel="http://backend.userland.com/blogChannelModule"
            <?php do_action('rss2_ns'); ?>>
            
    <channel>
            <title><?php bloginfo_rss('name'); ?> - Latest News Feed</title>
            <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
            <link><?php bloginfo_rss('url') ?></link>
            <description><?php bloginfo_rss('description') ?></description>
            <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
            <language>en</language>
            <?php do_action('rss2_head'); ?>
            <item>
                    <title><?php echo "some title"; ?></title> 
                    
                    <description><![CDATA[<?php echo "boop";?>]]></description>
                    
                    
                    <?php //do_action('rss2_item'); ?>
            </item>
            
    </channel>
    </rss>
    
    <?php
    
    
}



?>