<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fn="http://www.w3.org/2005/xpath-functions" exclude-result-refixes="fn">
  <xsl:output method="html" />
  <xsl:param name="id"></xsl:param>
       	<xsl:template match="//Region">
			<h1>Images of <xsl:value-of select="@title"/></h1>
			<xsl:for-each select="Content/Images/Image">
                <h2><xsl:value-of select="@title"/></h2>
               <xsl:element name="img">
                   <xsl:attribute name="src">
				    https://worldtravelguide.net/<xsl:value-of select="HeroImage/Filepath/text()"/>
                    </xsl:attribute>
                   <xsl:attribute name="width">
				   	100%
                    </xsl:attribute>

                   <xsl:attribute name="alt">
				    <xsl:value-of select="Caption/text()"/>
                    </xsl:attribute>
                </xsl:element>
				<p>Source: <xsl:value-of select="Source"/></p>
				<p>Copyright: <xsl:value-of select="Copyright"/></p>
 
            </xsl:for-each>			
       	</xsl:template>
</xsl:stylesheet>

<!-->					<Images>
						<Image image_api_id="56f2abbe6fd9027462ac7441" image_nid="5585342" title="Lake Ohrid in Albania ">
							<Source><![CDATA[redstallion / Thinkstock]]></Source>
							<Copyright><![CDATA[redstallion / Thinkstock ]]></Copyright>
							<Caption><![CDATA[Lake Ohrid in Albania ]]></Caption>
							<OriginalImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_JhNJ67.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_JhNJ67.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[2469589]]></Filesize>
								<Width><![CDATA[0]]></Width>
								<Height><![CDATA[0]]></Height>
							</OriginalImage>
							<HeroImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_xTYQrk.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_xTYQrk.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[399056]]></Filesize>
								<Width><![CDATA[0]]></Width>
								<Height><![CDATA[0]]></Height>
							</HeroImage>
							<RotatorImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_ikhWiP.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_ikhWiP.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[57696]]></Filesize>
								<Width><![CDATA[0]]></Width>
								<Height><![CDATA[0]]></Height>
							</RotatorImage>
							<TeaserImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_vIMivx.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_vIMivx.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[30218]]></Filesize>
								<Width><![CDATA[0]]></Width>
								<Height><![CDATA[0]]></Height>
							</TeaserImage>
							<ThumbImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_2nmDTJ.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_2nmDTJ.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[17110]]></Filesize>
								<Width><![CDATA[140]]></Width>
								<Height><![CDATA[59]]></Height>
							</ThumbImage>
							<OtherImage>
								<Filename><![CDATA[Lake_Ohrid_in_Albania__160323144421_ikhWiP.jpg]]></Filename>
								<Filepath><![CDATA[sites/default/files/Lake_Ohrid_in_Albania__160323144421_ikhWiP.jpg]]></Filepath>
								<Mimetype><![CDATA[image/jpeg]]></Mimetype>
								<Filesize><![CDATA[57696]]></Filesize>
								<Width><![CDATA[0]]></Width>
								<Height><![CDATA[0]]></Height>
							</OtherImage>
						</Image> -->
