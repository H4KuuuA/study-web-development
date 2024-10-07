<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログシステム</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { text-align: center; }
        .container { max-width: 800px; margin: auto; }
        .article { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
        .tag { display: inline-block; background: #eee; margin: 2px; padding: 5px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>ブログ記事投稿システム</h1>

        <!-- 記事投稿フォーム -->
        <h2>新しい記事を投稿</h2>
        <form id="postForm">
            <input type="text" id="title" placeholder="タイトル" required><br><br>
            <textarea id="content" placeholder="本文" required></textarea><br><br>
            <label for="tags">タグ（カンマ区切り）:</label>
            <input type="text" id="tags" placeholder="タグを入力"><br><br>
            <button type="submit">投稿</button>
        </form>

        <h2>記事一覧</h2>
        <div id="articleList"></div>
    </div>

    <script>
        const articleList = [];
        const articleListDiv = document.getElementById('articleList');

        // 記事投稿処理
        document.getElementById('postForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const content = document.getElementById('content').value;
            const tags = document.getElementById('tags').value.split(',').map(tag => tag.trim()).filter(tag => tag);
            const timestamp = new Date().toLocaleString();

            const article = { title, content, tags, timestamp };
            articleList.push(article);
            displayArticles();
            this.reset();
        });

        // 記事表示処理
        function displayArticles() {
            articleListDiv.innerHTML = '';
            articleList.forEach((article, index) => {
                const articleDiv = document.createElement('div');
                articleDiv.className = 'article';
                articleDiv.innerHTML = `
                    <h3>${article.title}</h3>
                    <p>${article.content}</p>
                    <div>${article.tags.map(tag => `<span class="tag">${tag}</span>`).join(' ')}</div>
                    <small>${article.timestamp}</small>
                    <button onclick="deleteArticle(${index})">削除</button>
                `;
                articleListDiv.appendChild(articleDiv);
            });
        }

        // 記事削除処理
        function deleteArticle(index) {
            articleList.splice(index, 1);
            displayArticles();
        }
    </script>
</body>
</html>

