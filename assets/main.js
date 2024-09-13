document.getElementById("shorten-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const longUrl = document.getElementById("longUrl").value;
    const customAlias = document.getElementById("customAlias").value;

    fetch('shorten.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `longUrl=${encodeURIComponent(longUrl)}&customAlias=${encodeURIComponent(customAlias)}`
    })

    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            const shortenedUrlElement = document.getElementById("shortenedUrl");
            const copyBtn = document.getElementById("copyBtn");

            shortenedUrlElement.textContent = data.shortUrl;
            shortenedUrlElement.href = data.shortUrl;
            document.getElementById("result").classList.remove("d-none");

            // Event listener untuk tombol copy
            copyBtn.addEventListener("click", function () {
                navigator.clipboard.writeText(data.shortUrl).then(
                    () => {
                    alert("Link copied to clipboard!");
                    },
                    (err) => {
                    console.error("Could not copy text: ", err);
                    }
                );
            });
        }
    });
});
