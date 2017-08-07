<?php 

function get_quarry()
{
$quarry = 'SELECT 

t.page_id AS PID,
r2.rev_id AS CreateRID,
r2.rev_timestamp AS CreateTime,
r2.rev_user_text AS Creator,
r1.rev_id AS LastRID,
r1.rev_timestamp AS LastTime,
r1.rev_user_text AS LastEditor,
r1.rev_len AS LastSize,
t.cnt AS Edits,
t.page_title AS Title


FROM ( 	
  	SELECT COUNT(*) AS cnt, r.rev_timestamp, p.page_id, p.page_title, p.page_latest, p.page_namespace
  	FROM revision r
	LEFT JOIN page p ON p.page_id = r.rev_page
	WHERE r.rev_page IN ( 
		SELECT page_id FROM page p2
    	WHERE p2.page_namespace = 0 AND p2.page_title IN (
		SELECT page_title FROM page
      	WHERE page_id IN ( 
			SELECT cl_from FROM categorylinks
      		WHERE
     cl_to = "୨୦୧୭-ମହିଳା_ଇତିହାସ_ମାସରେ_ଗଢ଼ା_ବା_ଉନ୍ନତ_କରାଯାଇଥିବା_ପ୍ରସଙ୍ଗମାନ" 			#ml - The Category Name
        	) 
    	)
	)
	AND p.page_namespace = 0
	GROUP BY page_namespace, page_title
) AS t
LEFT JOIN revision r2 ON r2.rev_page = t.page_id AND r2.rev_parent_id = 0
LEFT JOIN revision r1 ON r1.rev_id = t.page_latest
GROUP BY t.page_namespace, t.page_title order by r2.rev_timestamp asc;';
return $quarry;
}
