<!-- Block Social Networks module -->
<!--
/*
 * Module ......: blocksocialnetworks
 * File ........: blocksocialnetworks.tpl
 * Description .: Simple Prestashop Module to publish Social Network links on template
 * Authot ......: Luis Machado Reis <luis.reis@singularideas.com.br>
 * Licence .....: GNU Lesser General Public License V3
 * Created .....: 01/09/2010
 */
-->
<div id="tags_block_left" class="block tags_block">
	<h4>{l s='Social Networks' mod='blocksocialnetworks'}</h4>
	<p class="block_content" style="text-align:right">
    {if $linkTwitter}
		<a href="{$linkTwitter}" title="Twitter" target="_blank">
        	<img src="{$linkPrefixImg}/twitter.png" alt="Twitter" border="0"/>
        </a>
    {/if}
    {if $linkFacebook}
    	&nbsp;
		<a href="{$linkFacebook}" title="Facebook" target="_blank">
        	<img src="{$linkPrefixImg}/facebook.png" alt="Facebook" border="0"/>
        </a>
    {/if}
    {if $linkFlickr}
    	&nbsp;
		<a href="{$linkFlickr}" title="Flickr" target="_blank">
        	<img src="{$linkPrefixImg}/flickr.gif" alt="Flickr" border="0"/>
        </a>
    {/if}
    {if $linkYoutube}
    	&nbsp;
		<a href="{$linkYoutube}" title="Youtube" target="_blank">
        	<img src="{$linkPrefixImg}/youtube.png" alt="Youtube" border="0"/>
        </a>
    {/if}
    {if $linkOrkut}
    	&nbsp;
		<a href="{$linkOrkut}" title="Orkut" target="_blank">
        	<img src="{$linkPrefixImg}/orkut.gif" alt="Orkut" border="0"/>
        </a>
    {/if}
    {if $linkPicasa}
    	&nbsp;
		<a href="{$linkPicasa}" title="Picasa" target="_blank">
        	<img src="{$linkPrefixImg}/picasa.jpg" alt="Picasa" border="0"/>
        </a>
    {/if}
	</p>
</div>
<!-- /Block Social Networks module -->
