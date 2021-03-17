function main(key = null) {
    fetch(`https://arafat1243.github.io/copyright/index.json`)
        .then((res) => {
            return res.json();
        })
        .then(function(obj) {
            let el = document.querySelector("footer a.copyright");
            let name = "",
                url = "";
            if (key && key in obj) {
                (name = obj[key].name), (url = obj[key].url);
            } else {
                (name = obj.default.name), (url = obj.default.url);
            }
            if (!el) {
                el = document.createElement("a");
                el.classList.add('copyright')
                const style = document.createElement('style');
                style.append(`
                    a.copyright {
                        position: fixed;
                        bottom: 10px;
                        color: red;
                        z-index: 999;
                    }
                `);
                document.head.append(style);
                document.body.insertBefore(el, document.querySelector('script'));
            }
            el.setAttribute("href", url), (el.innerHTML = name);
        })
        .catch(function(error) {
            console.error(error);
        });
}

module.exports.main = main;