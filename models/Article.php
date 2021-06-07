<?php 

class Article {

    private $title; 
    private $content; 
    private $image; 
    private $tag;
    private $user_id;

    public function __construct($title, $content, $image, $tag, $user_id) {
        $this->title = stripslashes(htmlspecialchars($title));
        $this->content = stripslashes(htmlspecialchars($content));
        $this->image = strtolower(stripslashes(htmlspecialchars($image)));
        $this->tag = strtolower(stripslashes(htmlspecialchars($tag)));
        $this->user_id = stripslashes(htmlspecialchars($user_id));
    }
    
    public function add() {
        global $conn;

        $sql = "INSERT 
                INTO 
                    tb_articles(title, 
                                content, 
                                image, 
                                user_id)
                VALUES 
                    ('{$this->title}',
                     '{$this->content}',
                     '{$this->image}',
                      {$this->user_id})";

        $query = mysqli_query($conn, $sql);

        return true;
    }

    public static function get( int $id_article = null) {
        global $conn;
        $id_article = stripslashes(htmlspecialchars($id_article));
        $sql = "SELECT
                    tb_articles.id,
                    tb_articles.title,
                    tb_articles.content,
                    tb_articles.image,
                    tb_articles.created_at,
                    tb_articles.updated_at,
                    tb_articles.user_id,
                    tb_users.name
                FROM 
                    tb_articles
                INNER JOIN 
                    tb_users
                    ON tb_users.id = tb_articles.user_id";
        
        if( $id_article != null ) {
            $sql .= " WHERE tb_articles.id = {$id_article}";
        }

        $query = mysqli_query($conn, $sql);
        $article = mysqli_fetch_all($query, MYSQLI_ASSOC);


        $article_found = [];

        for( $i = 0; $i < count($article); $i++ ) {
            $article_found[]["article"] = $article[$i];
            $article_found[$i]["tag"] = Article::getTag($article[$i]["id"]);
        }

        return $article_found;
    }

    public function getArticleId() {
        global $conn;

        $sql = "SELECT
                    tb_articles.id
                FROM 
                    tb_articles
                WHERE
                    tb_articles.title = '{$this->title}' AND
                    tb_articles.content = '{$this->content}' AND
                    tb_articles.image = '{$this->image}' ";

        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $data[0]["id"];
    }

    public static function getTag( int $id_artc) {
        global $conn;

        $sql = "SELECT article_tags.tag
                FROM 
                    article_tags
                WHERE
                    article_tags.article_id = {$id_artc}";

        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $tags = [];
        for( $i=0; $i < count($data); $i++ ) {
            $tags[] = $data[$i]["tag"];
        }
        
        return (array) $tags;
    }

    public function addTag($id_article) {
        global $conn;

        $tags = explode(" ",$this->tag);

        foreach ($tags as $tag ) {
            $sql = "INSERT 
                    INTO article_tags(article_id, tag)
                    VALUES ({$id_article}, '{$tag}') 
                    ";
            $query = mysqli_query($conn, $sql);
        }
    }

    public function deleteTag($id_article) {
        global $conn;

        $sql = "DELETE 
                FROM 
                    article_tags
                WHERE
                    article_tags.article_id = {$id_article}";
        $query = mysqli_query($conn, $sql);

        return $query;
    }

    public static function delete($id_article) {
        global $conn;

        $sql = "DELETE 
                FROM 
                    tb_articles 
                WHERE 
                    tb_articles.id = {$id_article}";

        $query = mysqli_query($conn, $sql);

        if( !mysqli_affected_rows($conn) > 0 ) {
            return false;
        }

        return true;
    }

    public function edit($data, $article_id) {
        global $conn;

        $title = stripslashes(htmlspecialchars($data["title"]));
        $content = stripslashes(htmlspecialchars($data["content"]));
        $tag = stripslashes(htmlspecialchars($data["tag"]));
        $image = stripslashes(htmlspecialchars($data["image"]));

        $sql = "UPDATE 
                    tb_articles 
                SET
                    title='{$title}',
                    content='{$content}',
                    image = '{$image}'
                WHERE
                    tb_articles.id = {$article_id}";

        $query = mysqli_query($conn, $sql);

        $tag_delete = $this->deleteTag($article_id);
        $this->tag = $tag;
        $tag_add = $this->addTag($article_id);

        return $query;
    }
}
