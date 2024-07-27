<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/PostController.php";
$postController = new PostController($conn);

$post_id = isset($_GET['post_id']) ? $_GET['post_id'] : '';

if (!$post_id) {
    header("Location: /");
    exit();
}

$post = $postController->getDetailPost($post_id);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=2, minimum-scale=1 , user-scalable=0">
    <meta name="theme-color" content="#5191fa" />
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="traveler" content="3.1.4" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="https://mixmap.travelerwp.com/xmlrpc.php">
    <title><?php echo $post['title'] ?> &#8211; Traveler Theme</title>
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="//api.tiles.mapbox.com" />
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com" />
    <link rel="dns-prefetch" href="//maxst.icons8.com" />
    <link rel="dns-prefetch" href="//api.mapbox.com" />
    <link rel="alternate" type="application/rss+xml" title="Traveler Theme &raquo; Feed" href="https://mixmap.travelerwp.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Traveler Theme &raquo; Comments Feed" href="https://mixmap.travelerwp.com/comments/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Traveler Theme &raquo; All Aboard the Rocky Mountaineer Comments Feed" href="https://mixmap.travelerwp.com/all-aboard-the-rocky-mountaineer/feed/" />
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/mixmap.travelerwp.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.5.5"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="https://mixmap.travelerwp.com/wp-includes/css/dist/block-library/style.min.css?ver=6.5.5" type="text/css" media="all" />
    <style id="classic-theme-styles-inline-css" type="text/css">
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id="global-styles-inline-css" type="text/css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel="stylesheet" id="contact-form-7-css" href="https://mixmap.travelerwp.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.9.8" type="text/css" media="all" />
    <link rel="stylesheet" id="google-font-css-css" href="https://fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600&#038;ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="bootstrap-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/bootstrap.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="helpers-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/helpers.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="font-awesome-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/font-awesome.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="fotorama-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/fotorama/fotorama.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="rangeSlider-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/ion.rangeSlider/css/ion.rangeSlider.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="rangeSlider-skinHTML5-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/ion.rangeSlider/css/ion.rangeSlider.skinHTML5.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="daterangepicker-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/daterangepicker/daterangepicker.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="awesome-line-awesome-css-css" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.1.0/css/line-awesome.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="sweetalert2-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/sweetalert2.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="select2.min-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/select2.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="flickity-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/flickity.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="magnific-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/magnific-popup/magnific-popup.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="owlcarousel-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/owlcarousel/assets/owl.carousel.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="st-style-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/style.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="affilate-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/affilate.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="affilate-h-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/affilate-h.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="search-result-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/search_result.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="st-fix-safari-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/fsafari.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="checkout-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/checkout.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="partner-page-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/partner_page.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="responsive-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/responsive.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="mCustomScrollbar-css-css" href="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="single-tour-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/sin-tour.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="enquire-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/enquire.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="mapbox-css-css" href="https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.0/mapbox-gl.css?optimize=true&#038;ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="mapbox-css-api-css" href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="mapbox-custom-css-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/css/mapbox-custom.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="search-style-css" href="https://mixmap.travelerwp.com/wp-content/plugins/traveler-smart-search/vue/spa/assets/css/style.min.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="parent-style-css" href="https://mixmap.travelerwp.com/wp-content/themes/traveler/style.css?ver=6.5.5" type="text/css" media="all" />
    <link rel="stylesheet" id="child-style-css" href="https://mixmap.travelerwp.com/wp-content/themes/childtheme-mixmap-main/style.css?ver=6.5.5" type="text/css" media="all" />
    <script type="text/javascript" id="jquery-core-js-extra">
        /* <![CDATA[ */
        var list_location = {
            "list": "\"\""
        };
        var st_checkout_text = {
            "without_pp": "Submit Request",
            "with_pp": "Booking Now",
            "validate_form": "Please fill all required fields",
            "error_accept_term": "Please accept our terms and conditions",
            "email_validate": "Email is not valid",
            "adult_price": "Adult",
            "child_price": "Child",
            "infant_price": "Infant",
            "adult": "Adult",
            "child": "Child",
            "infant": "Infant",
            "price": "Price",
            "origin_price": "Origin Price",
            "text_unavailable": "Not Available: "
        };
        var st_params = {
            "theme_url": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler",
            "locale_fullcalendar": "en",
            "caculator_price_single_ajax": "on",
            "site_url": "https:\/\/mixmap.travelerwp.com",
            "load_price": "https:\/\/mixmap.travelerwp.com",
            "ajax_url": "https:\/\/mixmap.travelerwp.com\/wp-admin\/admin-ajax.php",
            "loading_url": "https:\/\/mixmap.travelerwp.com\/wp-admin\/images\/wpspin_light.gif",
            "st_search_nonce": "529e60e0e4",
            "facebook_enable": "off",
            "facbook_app_id": "1072797793228882",
            "booking_currency_precision": "2",
            "thousand_separator": ".",
            "decimal_separator": ",",
            "currency_symbol": "$",
            "currency_position": "left",
            "currency_rtl_support": "off",
            "free_text": "Free",
            "date_format": "dd\/mm\/yyyy",
            "date_format_calendar": "dd\/mm\/yyyy",
            "time_format": "12h",
            "mk_my_location": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/my_location.png",
            "locale": "en_US",
            "header_bgr": "",
            "text_refresh": "Refresh",
            "date_fomat": "DD\/MM\/YYYY",
            "text_loading": "Loading...",
            "text_no_more": "No More",
            "weather_api_key": "a82498aa9918914fa4ac5ba584a7e623",
            "no_vacancy": "No vacancies",
            "unlimited_vacancy": "Unlimited",
            "a_vacancy": "a vacancy",
            "more_vacancy": "vacancies",
            "utm": "https:\/\/shinetheme.com\/utm\/utm.gif",
            "_s": "848e8c9fef",
            "mclusmap": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_gruop_location.svg",
            "icon_contact_map": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/markers\/ico_location_3.png",
            "text_adult": "Adult",
            "text_adults": "Adults",
            "text_child": "Children",
            "text_childs": "Childrens",
            "text_price": "Price",
            "text_origin_price": "Origin Price",
            "text_unavailable": "Not Available ",
            "text_available": "Available ",
            "text_adult_price": "Adult Price ",
            "text_child_price": "Child Price ",
            "text_infant_price": "Infant Price",
            "text_update": "Update ",
            "token_mapbox": "pk.eyJ1IjoicGh1b25naHYiLCJhIjoiY2xodTg2YnJvMHVmaTNpbGI3bmpyNGQ0dyJ9.KZP8Ma45Wl_Eba5jQYhiPA",
            "text_rtl_mapbox": "",
            "st_icon_mapbox": "https:\/\/i.imgur.com\/MK4NUzI.png",
            "text_use_this_media": "Use this media",
            "text_select_image": "Select Image",
            "text_confirm_delete_item": "Are you sure want to delete this item?",
            "text_process_cancel": "You cancelled the process",
            "start_at_text": "Start at",
            "end_at_text": "End at"
        };
        var st_timezone = {
            "timezone_string": ""
        };
        var locale_daterangepicker = {
            "direction": "ltr",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            "firstDay": "1",
            "today": "Today"
        };
        var st_list_map_params = {
            "mk_my_location": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/my_location.png",
            "text_my_location": "3000 m radius",
            "text_no_result": "No Result",
            "cluster_0": "<div class='cluster cluster-1'>CLUSTER_COUNT<\/div>",
            "cluster_20": "<div class='cluster cluster-2'>CLUSTER_COUNT<\/div>",
            "cluster_50": "<div class='cluster cluster-3'>CLUSTER_COUNT<\/div>",
            "cluster_m1": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/map\/m1.png",
            "cluster_m2": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/map\/m2.png",
            "cluster_m3": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/map\/m3.png",
            "cluster_m4": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/map\/m4.png",
            "cluster_m5": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/img\/map\/m5.png",
            "icon_full_screen": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_fullscreen.svg",
            "icon_my_location": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_location.svg",
            "icon_my_style": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_view_maps.svg",
            "icon_zoom_out": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_maps_zoom-out.svg",
            "icon_zoom_in": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/ico_maps_zoom_in.svg",
            "icon_close": "https:\/\/mixmap.travelerwp.com\/wp-content\/themes\/traveler\/v2\/images\/icon_map\/icon_close.svg"
        };
        var st_config_partner = {
            "text_er_image_format": ""
        };
        var st_hotel_localize = {
            "booking_required_adult": "Please select adult number",
            "booking_required_children": "Please select children number",
            "booking_required_adult_children": "Please select Adult and  Children number",
            "room": "Room",
            "is_aoc_fail": "Please select the ages of children",
            "is_not_select_date": "Please select Check-in and Check-out date",
            "is_not_select_check_in_date": "Please select Check-in date",
            "is_not_select_check_out_date": "Please select Check-out date",
            "is_host_name_fail": "Please provide Host Name(s)"
        };
        var st_icon_picker = {
            "icon_list": ["fa-glass", "fa-music", "fa-search", "fa-envelope-o", "fa-heart", "fa-star", "fa-star-o", "fa-user", "fa-film", "fa-th-large", "fa-th", "fa-th-list", "fa-check", "fa-remove", "fa-close", "fa-times", "fa-search-plus", "fa-search-minus", "fa-power-off", "fa-signal", "fa-gear", "fa-cog", "fa-trash-o", "fa-home", "fa-file-o", "fa-clock-o", "fa-road", "fa-download", "fa-arrow-circle-o-down", "fa-arrow-circle-o-up", "fa-inbox", "fa-play-circle-o", "fa-rotate-right", "fa-repeat", "fa-refresh", "fa-list-alt", "fa-lock", "fa-flag", "fa-headphones", "fa-volume-off", "fa-volume-down", "fa-volume-up", "fa-qrcode", "fa-barcode", "fa-tag", "fa-tags", "fa-book", "fa-bookmark", "fa-print", "fa-camera", "fa-font", "fa-bold", "fa-italic", "fa-text-height", "fa-text-width", "fa-align-left", "fa-align-center", "fa-align-right", "fa-align-justify", "fa-list", "fa-dedent", "fa-outdent", "fa-indent", "fa-video-camera", "fa-photo", "fa-image", "fa-picture-o", "fa-pencil", "fa-map-marker", "fa-adjust", "fa-tint", "fa-edit", "fa-pencil-square-o", "fa-share-square-o", "fa-check-square-o", "fa-arrows", "fa-step-backward", "fa-fast-backward", "fa-backward", "fa-play", "fa-pause", "fa-stop", "fa-forward", "fa-fast-forward", "fa-step-forward", "fa-eject", "fa-chevron-left", "fa-chevron-right", "fa-plus-circle", "fa-minus-circle", "fa-times-circle", "fa-check-circle", "fa-question-circle", "fa-info-circle", "fa-crosshairs", "fa-times-circle-o", "fa-check-circle-o", "fa-ban", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrow-down", "fa-mail-forward", "fa-share", "fa-expand", "fa-compress", "fa-plus", "fa-minus", "fa-asterisk", "fa-exclamation-circle", "fa-gift", "fa-leaf", "fa-fire", "fa-eye", "fa-eye-slash", "fa-warning", "fa-exclamation-triangle", "fa-plane", "fa-calendar", "fa-random", "fa-comment", "fa-magnet", "fa-chevron-up", "fa-chevron-down", "fa-retweet", "fa-shopping-cart", "fa-folder", "fa-folder-open", "fa-arrows-v", "fa-arrows-h", "fa-bar-chart-o", "fa-bar-chart", "fa-twitter-square", "fa-facebook-square", "fa-camera-retro", "fa-key", "fa-gears", "fa-cogs", "fa-comments", "fa-thumbs-o-up", "fa-thumbs-o-down", "fa-star-half", "fa-heart-o", "fa-sign-out", "fa-linkedin-square", "fa-thumb-tack", "fa-external-link", "fa-sign-in", "fa-trophy", "fa-github-square", "fa-upload", "fa-lemon-o", "fa-phone", "fa-square-o", "fa-bookmark-o", "fa-phone-square", "fa-twitter", "fa-facebook-f", "fa-facebook", "fa-github", "fa-unlock", "fa-credit-card", "fa-feed", "fa-rss", "fa-hdd-o", "fa-bullhorn", "fa-bell", "fa-certificate", "fa-hand-o-right", "fa-hand-o-left", "fa-hand-o-up", "fa-hand-o-down", "fa-arrow-circle-left", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-circle-down", "fa-globe", "fa-wrench", "fa-tasks", "fa-filter", "fa-briefcase", "fa-arrows-alt", "fa-group", "fa-users", "fa-chain", "fa-link", "fa-cloud", "fa-flask", "fa-cut", "fa-scissors", "fa-copy", "fa-files-o", "fa-paperclip", "fa-save", "fa-floppy-o", "fa-square", "fa-navicon", "fa-reorder", "fa-bars", "fa-list-ul", "fa-list-ol", "fa-strikethrough", "fa-underline", "fa-table", "fa-magic", "fa-truck", "fa-pinterest", "fa-pinterest-square", "fa-google-plus-square", "fa-google-plus", "fa-money", "fa-caret-down", "fa-caret-up", "fa-caret-left", "fa-caret-right", "fa-columns", "fa-unsorted", "fa-sort", "fa-sort-down", "fa-sort-desc", "fa-sort-up", "fa-sort-asc", "fa-envelope", "fa-linkedin", "fa-rotate-left", "fa-undo", "fa-legal", "fa-gavel", "fa-dashboard", "fa-tachometer", "fa-comment-o", "fa-comments-o", "fa-flash", "fa-bolt", "fa-sitemap", "fa-umbrella", "fa-paste", "fa-clipboard", "fa-lightbulb-o", "fa-exchange", "fa-cloud-download", "fa-cloud-upload", "fa-user-md", "fa-stethoscope", "fa-suitcase", "fa-bell-o", "fa-coffee", "fa-cutlery", "fa-file-text-o", "fa-building-o", "fa-hospital-o", "fa-ambulance", "fa-medkit", "fa-fighter-jet", "fa-beer", "fa-h-square", "fa-plus-square", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-double-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-angle-down", "fa-desktop", "fa-laptop", "fa-tablet", "fa-mobile-phone", "fa-mobile", "fa-circle-o", "fa-quote-left", "fa-quote-right", "fa-spinner", "fa-circle", "fa-mail-reply", "fa-reply", "fa-github-alt", "fa-folder-o", "fa-folder-open-o", "fa-smile-o", "fa-frown-o", "fa-meh-o", "fa-gamepad", "fa-keyboard-o", "fa-flag-o", "fa-flag-checkered", "fa-terminal", "fa-code", "fa-mail-reply-all", "fa-reply-all", "fa-star-half-empty", "fa-star-half-full", "fa-star-half-o", "fa-location-arrow", "fa-crop", "fa-code-fork", "fa-unlink", "fa-chain-broken", "fa-question", "fa-info", "fa-exclamation", "fa-superscript", "fa-subscript", "fa-eraser", "fa-puzzle-piece", "fa-microphone", "fa-microphone-slash", "fa-shield", "fa-calendar-o", "fa-fire-extinguisher", "fa-rocket", "fa-maxcdn", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-circle-up", "fa-chevron-circle-down", "fa-html5", "fa-css3", "fa-anchor", "fa-unlock-alt", "fa-bullseye", "fa-ellipsis-h", "fa-ellipsis-v", "fa-rss-square", "fa-play-circle", "fa-ticket", "fa-minus-square", "fa-minus-square-o", "fa-level-up", "fa-level-down", "fa-check-square", "fa-pencil-square", "fa-external-link-square", "fa-share-square", "fa-compass", "fa-toggle-down", "fa-caret-square-o-down", "fa-toggle-up", "fa-caret-square-o-up", "fa-toggle-right", "fa-caret-square-o-right", "fa-euro", "fa-eur", "fa-gbp", "fa-dollar", "fa-usd", "fa-rupee", "fa-inr", "fa-cny", "fa-rmb", "fa-yen", "fa-jpy", "fa-ruble", "fa-rouble", "fa-rub", "fa-won", "fa-krw", "fa-bitcoin", "fa-btc", "fa-file", "fa-file-text", "fa-sort-alpha-asc", "fa-sort-alpha-desc", "fa-sort-amount-asc", "fa-sort-amount-desc", "fa-sort-numeric-asc", "fa-sort-numeric-desc", "fa-thumbs-up", "fa-thumbs-down", "fa-youtube-square", "fa-youtube", "fa-xing", "fa-xing-square", "fa-youtube-play", "fa-dropbox", "fa-stack-overflow", "fa-instagram", "fa-flickr", "fa-adn", "fa-bitbucket", "fa-bitbucket-square", "fa-tumblr", "fa-tumblr-square", "fa-long-arrow-down", "fa-long-arrow-up", "fa-long-arrow-left", "fa-long-arrow-right", "fa-apple", "fa-windows", "fa-android", "fa-linux", "fa-dribbble", "fa-skype", "fa-foursquare", "fa-trello", "fa-female", "fa-male", "fa-gittip", "fa-gratipay", "fa-sun-o", "fa-moon-o", "fa-archive", "fa-bug", "fa-vk", "fa-weibo", "fa-renren", "fa-pagelines", "fa-stack-exchange", "fa-arrow-circle-o-right", "fa-arrow-circle-o-left", "fa-toggle-left", "fa-caret-square-o-left", "fa-dot-circle-o", "fa-wheelchair", "fa-vimeo-square", "fa-turkish-lira", "fa-try", "fa-plus-square-o", "fa-space-shuttle", "fa-slack", "fa-envelope-square", "fa-wordpress", "fa-openid", "fa-institution", "fa-bank", "fa-university", "fa-mortar-board", "fa-graduation-cap", "fa-yahoo", "fa-google", "fa-reddit", "fa-reddit-square", "fa-stumbleupon-circle", "fa-stumbleupon", "fa-delicious", "fa-digg", "fa-pied-piper", "fa-pied-piper-alt", "fa-drupal", "fa-joomla", "fa-language", "fa-fax", "fa-building", "fa-child", "fa-paw", "fa-spoon", "fa-cube", "fa-cubes", "fa-behance", "fa-behance-square", "fa-steam", "fa-steam-square", "fa-recycle", "fa-automobile", "fa-car", "fa-cab", "fa-taxi", "fa-tree", "fa-spotify", "fa-deviantart", "fa-soundcloud", "fa-database", "fa-file-pdf-o", "fa-file-word-o", "fa-file-excel-o", "fa-file-powerpoint-o", "fa-file-photo-o", "fa-file-picture-o", "fa-file-image-o", "fa-file-zip-o", "fa-file-archive-o", "fa-file-sound-o", "fa-file-audio-o", "fa-file-movie-o", "fa-file-video-o", "fa-file-code-o", "fa-vine", "fa-codepen", "fa-jsfiddle", "fa-life-bouy", "fa-life-buoy", "fa-life-saver", "fa-support", "fa-life-ring", "fa-circle-o-notch", "fa-ra", "fa-rebel", "fa-ge", "fa-empire", "fa-git-square", "fa-git", "fa-y-combinator-square", "fa-yc-square", "fa-hacker-news", "fa-tencent-weibo", "fa-qq", "fa-wechat", "fa-weixin", "fa-send", "fa-paper-plane", "fa-send-o", "fa-paper-plane-o", "fa-history", "fa-circle-thin", "fa-header", "fa-paragraph", "fa-sliders", "fa-share-alt", "fa-share-alt-square", "fa-bomb", "fa-soccer-ball-o", "fa-futbol-o", "fa-tty", "fa-binoculars", "fa-plug", "fa-slideshare", "fa-twitch", "fa-yelp", "fa-newspaper-o", "fa-wifi", "fa-calculator", "fa-paypal", "fa-google-wallet", "fa-cc-visa", "fa-cc-mastercard", "fa-cc-discover", "fa-cc-amex", "fa-cc-paypal", "fa-cc-stripe", "fa-bell-slash", "fa-bell-slash-o", "fa-trash", "fa-copyright", "fa-at", "fa-eyedropper", "fa-paint-brush", "fa-birthday-cake", "fa-area-chart", "fa-pie-chart", "fa-line-chart", "fa-lastfm", "fa-lastfm-square", "fa-toggle-off", "fa-toggle-on", "fa-bicycle", "fa-bus", "fa-ioxhost", "fa-angellist", "fa-cc", "fa-shekel", "fa-sheqel", "fa-ils", "fa-meanpath", "fa-buysellads", "fa-connectdevelop", "fa-dashcube", "fa-forumbee", "fa-leanpub", "fa-sellsy", "fa-shirtsinbulk", "fa-simplybuilt", "fa-skyatlas", "fa-cart-plus", "fa-cart-arrow-down", "fa-diamond", "fa-ship", "fa-user-secret", "fa-motorcycle", "fa-street-view", "fa-heartbeat", "fa-venus", "fa-mars", "fa-mercury", "fa-intersex", "fa-transgender", "fa-transgender-alt", "fa-venus-double", "fa-mars-double", "fa-venus-mars", "fa-mars-stroke", "fa-mars-stroke-v", "fa-mars-stroke-h", "fa-neuter", "fa-genderless", "fa-facebook-official", "fa-pinterest-p", "fa-whatsapp", "fa-server", "fa-user-plus", "fa-user-times", "fa-hotel", "fa-bed", "fa-viacoin", "fa-train", "fa-subway", "fa-medium", "fa-yc", "fa-y-combinator", "fa-optin-monster", "fa-opencart", "fa-expeditedssl", "fa-battery-4", "fa-battery-full", "fa-battery-3", "fa-battery-three-quarters", "fa-battery-2", "fa-battery-half", "fa-battery-1", "fa-battery-quarter", "fa-battery-0", "fa-battery-empty", "fa-mouse-pointer", "fa-i-cursor", "fa-object-group", "fa-object-ungroup", "fa-sticky-note", "fa-sticky-note-o", "fa-cc-jcb", "fa-cc-diners-club", "fa-clone", "fa-balance-scale", "fa-hourglass-o", "fa-hourglass-1", "fa-hourglass-start", "fa-hourglass-2", "fa-hourglass-half", "fa-hourglass-3", "fa-hourglass-end", "fa-hourglass", "fa-hand-grab-o", "fa-hand-rock-o", "fa-hand-stop-o", "fa-hand-paper-o", "fa-hand-scissors-o", "fa-hand-lizard-o", "fa-hand-spock-o", "fa-hand-pointer-o", "fa-hand-peace-o", "fa-trademark", "fa-registered", "fa-creative-commons", "fa-gg", "fa-gg-circle", "fa-tripadvisor", "fa-odnoklassniki", "fa-odnoklassniki-square", "fa-get-pocket", "fa-wikipedia-w", "fa-safari", "fa-chrome", "fa-firefox", "fa-opera", "fa-internet-explorer", "fa-tv", "fa-television", "fa-contao", "fa-500px", "fa-amazon", "fa-calendar-plus-o", "fa-calendar-minus-o", "fa-calendar-times-o", "fa-calendar-check-o", "fa-industry", "fa-map-pin", "fa-map-signs", "fa-map-o", "fa-map", "fa-commenting", "fa-commenting-o", "fa-houzz", "fa-vimeo", "fa-black-tie", "fa-fonticons", "fa-reddit-alien", "fa-edge", "fa-credit-card-alt", "fa-codiepie", "fa-modx", "fa-fort-awesome", "fa-usb", "fa-product-hunt", "fa-mixcloud", "fa-scribd", "fa-pause-circle", "fa-pause-circle-o", "fa-stop-circle", "fa-stop-circle-o", "fa-shopping-bag", "fa-shopping-basket", "fa-hashtag", "fa-bluetooth", "fa-bluetooth-b", "fa-percent", "fa-gitlab", "fa-wpbeginner", "fa-wpforms", "fa-envira", "fa-universal-access", "fa-wheelchair-alt", "fa-question-circle-o", "fa-blind", "fa-audio-description", "fa-volume-control-phone", "fa-braille", "fa-assistive-listening-systems", "fa-asl-interpreting", "fa-american-sign-language-interpreting", "fa-deafness", "fa-hard-of-hearing", "fa-deaf", "fa-glide", "fa-glide-g", "fa-signing", "fa-sign-language", "fa-low-vision", "fa-viadeo", "fa-viadeo-square", "fa-snapchat", "fa-snapchat-ghost", "fa-snapchat-square"]
        };
        var st_timezone = {
            "timezone_string": ""
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js"></script>
    <script type="text/javascript" src="https://api.tiles.mapbox.com/mapbox-gl-js/v1.6.0/mapbox-gl.js" id="mapbox-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/magnific-popup/jquery.magnific-popup.min.js?ver=6.5.5" id="magnific-js-js"></script>
    <script></script>
    <link rel="https://api.w.org/" href="https://mixmap.travelerwp.com/wp-json/" />
    <link rel="alternate" type="application/json" href="https://mixmap.travelerwp.com/wp-json/wp/v2/posts/8007" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://mixmap.travelerwp.com/xmlrpc.php?rsd" />
    <link rel="canonical" href="https://mixmap.travelerwp.com/all-aboard-the-rocky-mountaineer/" />
    <link rel="shortlink" href="https://mixmap.travelerwp.com/?p=8007" />
    <link rel="alternate" type="application/json+oembed" href="https://mixmap.travelerwp.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmixmap.travelerwp.com%2Fall-aboard-the-rocky-mountaineer%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://mixmap.travelerwp.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmixmap.travelerwp.com%2Fall-aboard-the-rocky-mountaineer%2F&#038;format=xml" />
    <meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress." />

    <style id="st_custom_css_php">
        @media screen and (max-width: 782px) {
            html {
                margin-top: 0px !important;
            }

            .admin-bar.logged-in #header {
                padding-top: 45px;
            }

            .logged-in #header {
                margin-top: 0;
            }
        }

        :root {
            --main-color: #5191fa;
            --body-color: #232323;
            --link-color: #1a2b48;
            --link-color-hover: rgba(81, 145, 250, 0.9);
            --grey-color: #5E6D77;
            --heading-color: #232323;
            --light-grey-color: #EAEEF3;
            --orange-color: #FA5636;
        }

        .booking-item-rating .fa,
        .booking-item.booking-item-small .booking-item-rating-stars,
        .comment-form .add_rating,
        .booking-item-payment .booking-item-rating-stars .fa-star,
        .st-item-rating .fa,
        li .fa-star,
        li .fa-star-o,
        li .fa-star-half-o,
        .st-icheck-item label .fa,
        .single-st_hotel #st-content-wrapper .st-stars i,
        .service-list-wrapper .item .st-stars i,
        .services-item.item-elementor .item .content-item .st-stars .stt-icon,
        .st-hotel-result .item-service .thumb .booking-item-rating-stars li i {
            color: #FA5636;
        }

        .feature_class,
        .featured-image .featured {
            background: #19A1E5 !important;
        }

        .search-result-page.st-rental .item-service .featured-image .featured:after,
        body.single.single-location .st-overview-content.st_tab_service .st-content-over .st-tab-service-content #rental-search-result .featured-image .featured::after {
            border-bottom: 29px solid #19A1E5;
        }

        .room-item .content .btn-show-price,
        .room-item .content .show-detail,
        .btn,
        .wp-block-search__button,
        #gotop,
        .form-submit .submit {
            background: #5191fa;
            color: #FFF;
        }

        .room-item .content .btn-show-price:hover,
        .room-item .content .show-detail:hover,
        .btn:hover,
        .wp-block-search__button:hover,
        #gotop:hover,
        .form-submit .submit:hover {
            background: rgba(81, 145, 250, 0.9);
            color: #FFF;
        }

        .feature_class::before {
            border-color: #19A1E5 #19A1E5 transparent transparent;
        }

        .feature_class::after {
            border-color: #19A1E5 transparent #19A1E5 #19A1E5;
        }

        .featured_single .feature_class::before {
            border-color: transparent #19A1E5 transparent transparent;
        }

        .item-nearby .st_featured::before {
            border-color: transparent transparent #19A1E5 #19A1E5;
        }

        .item-nearby .st_featured::after {
            border-color: #19A1E5 #19A1E5 #19A1E5 transparent;
        }

        .st_sale_class {
            background-color: #cc0033;
        }

        .st_sale_class.st_sale_paper * {
            color: #cc0033
        }

        .st_sale_class .st_star_label_sale_div::after,
        .st_sale_label_1::before {
            border-color: #cc0033 transparent transparent #cc0033;
        }

        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus {
            outline: none;
        }

        .st_sale_class .st_star_label_sale_div::after {
            border-color: #cc0033
        }
    </style>


    <style type="text/css" id="st_custom_css">
    </style>


    <style type="text/css" id="st_enable_javascript">
        .search-tabs-bg>.tabbable>.tab-content>.tab-pane {
            display: none;
            opacity: 0;
        }

        .search-tabs-bg>.tabbable>.tab-content>.tab-pane.active {
            display: block;
            opacity: 1;
        }

        .search-tabs-to-top {
            margin-top: -120px;
        }
    </style>
    <style>
        .block1 {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 25px;
            width: 60%;
        }

        .columnstyle {
            height: 500px;
        }

        .columnstyle .bg-mask {
            opacity: 0;
        }

        li.vc_tta-tab {
            background-color: #f2f2f2;
        }

        li.vc_tta-tab.vc_active {
            background-color: #c6eaea;
        }

        .hotel-alone .menu-style-2 .menu .current-menu-ancestor>a {
            background: transparent !important;
        }

        .footer-custom a {
            color: #333;
        }

        .st-quickview-demo .toolbar-content .close {
            visibility: hidden;
        }

        .st-quickview-demo.active .toolbar-content .close {
            visibility: visible;
        }

        .single-st_hotel .tab-content {
            border-top: none;
        }

        .title-enquiry-form {
            padding: 2px 20px;
        }

        .single .st-sent-mail-customer {
            padding-bottom: 0;
        }

        .search-result-page .search-form-wrapper .form-button .advance .field-advance .dropdown .render,
        .search-result-page .search-form-wrapper .search-form .form-date-field .check-in-wrapper .render,
        .search-result-page .search-form-wrapper .search-form .form-extra-field .render {
            font-size: 15px !important;
        }

        @media screen and (max-width: 1300px) {
            #header .header .header-right .st-list li:last-child {
                display: none;
            }
        }




        @media screen and (max-width: 991px) {
            .st-header-2 header#header {
                margin-bottom: -106px;
            }
        }

        .st-list-tour-related .item h4.title {
            font-size: 16px;
        }

        .st-list-tour-related .item-service .service-title {
            font-size: 16px;
        }

        /* The switch - the box around the slider */
        #sticky-halfmap .top-filter .switch {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 20px;
        }

        /* Hide default HTML checkbox */
        #sticky-halfmap .top-filter .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        #sticky-halfmap .top-filter .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }



        #sticky-halfmap .top-filter .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            left: 2px;
        }

        #sticky-halfmap .top-filter input:checked .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: -13px;
            bottom: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        #sticky-halfmap .top-filter input:checked+.slider {
            background-color: #5191FA;
        }

        #sticky-halfmap .top-filter input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        #sticky-halfmap .top-filter input:checked+.slider:before {
            -webkit-transform: translateX(15px);
            -ms-transform: translateX(15px);
            transform: translateX(15px);
        }

        /* Rounded sliders */
        #sticky-halfmap .top-filter .slider.round {
            border-radius: 18px;
        }

        #sticky-halfmap .top-filter .slider.round:before {
            border-radius: 50%;
        }

        @media screen and (min-width: 992px) and (max-width: 1300px) {
            #header .header .header-right .st-list li.st-header-link {
                display: none;
            }
        }

        @media (max-width: 991px) {
            #st-main-menu .main-menu {
                height: calc(100% - 50px);
            }
        }

        .st-header-1 .header .logo img,
        .st-header-2 .header .logo img,
        .st-header-3 .header .logo img {
            width: 100%;
        }
    </style>

    <style>
        body {}
    </style>



    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <noscript>
        <style>
            .wpb_animate_when_almost_visible {
                opacity: 1;
            }
        </style>
    </noscript>
</head>

<body data-rsssl="1" class="post-template-default single single-post postid-8007 single-format-gallery  st-header-2 wide menu_style1 topbar_position_default search_enable_preload wpb-js-composer js-comp-ver-7.6 vc_responsive">
    <header id="header">
        <div id="topbar">
            <div class="topbar-left">
                <ul class="st-list socials">
                    <li>
                        <a href="https://www.facebook.com/" target="_self"><i class="fa fa fa-facebook"></i></a><a href="#" target="_self"><i class="fa fa-linkedin"></i></a><a href="#" target="_self"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <ul class="st-list topbar-items">
                    <li class="hidden-xs hidden-sm"><a href="/cdn-cgi/l/email-protection#8ffbfdeef9eae3eafdf8ffcfe8e2eee6e3a1ece0e2" target="_self"><span class="__cf_email__" data-cfemail="1c686e7d6a7970796e6b6c5c7b717d7570327f7371">[email&#160;protected]</span></a></li>
                </ul>
            </div>
            <div class="topbar-right">
                <ul class="st-list socials">
                    <li>
                    </li>
                </ul>
                <ul class="st-list topbar-items">
                    <li class="d-none d-sm-none d-md-inline-block topbar-item link-item ">
                        <a href="tel:999656888" class="login">(000) 999 - 656 -888</a>
                    </li>
                    <li class="topbar-item login-item hidden-xs hidden-sm">
                        <a href="#" class="login" data-toggle="modal" data-target="#st-login-form">Login</a>
                    </li>
                    <li class="topbar-item signup-item hidden-xs hidden-sm">
                        <a href="#" class="signup" data-toggle="modal" data-target="#st-register-form">Sign Up</a>
                    </li>
                    <li class="dropdown dropdown-currency hidden-xs hidden-sm">
                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            USD <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/all-aboard-the-rocky-mountaineer/?currency=EUR">EUR</a>
                            </li>
                            <li><a href="/all-aboard-the-rocky-mountaineer/?currency=AUD">AUD</a>
                            </li>
                            <li><a href="/all-aboard-the-rocky-mountaineer/?currency=COP">COP</a>
                            </li>
                            <li><a href="/all-aboard-the-rocky-mountaineer/?currency=AED">AED</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header">
            <a href="#" class="toggle-menu">
                <i class="input-icon st-border-radius field-icon fa"><svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                        <defs></defs>
                        <g id="Ico_off_menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                            <g stroke="#fff" stroke-width="1.5">
                                <g id="navigation-menu-4">
                                    <rect id="Rectangle-path" x="0.75" y="0.753" width="22.5" height="22.5" rx="1.5"></rect>
                                    <path d="M6.75,7.503 L17.25,7.503"></path>
                                    <path d="M6.75,12.003 L17.25,12.003"></path>
                                    <path d="M6.75,16.503 L17.25,16.503"></path>
                                </g>
                            </g>
                        </g>
                    </svg></i> </a>
            <div class="header-left">
                <a href="https://mixmap.travelerwp.com/" class="logo hidden-xs">
                    <img src="https://mixmap.travelerwp.com/wp-content/uploads/2018/11/mix_logo-2.svg" alt="WordPress Booking Theme">
                </a>
                <a href="https://mixmap.travelerwp.com/" class="logo hidden-lg hidden-md hidden-sm">
                    <img src="https://mixmap.travelerwp.com/wp-content/uploads/2018/11/mix_logo_mb.svg" alt="WordPress Booking Theme">
                </a>
                <nav id="st-main-menu">
                    <a href="#" class="back-menu"><i class="fa fa-angle-left"></i></a>
                    <ul id="main-menu" class="menu main-menu">
                        <li id="menu-item-7722" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-7722"><a class href="https://mixmap.travelerwp.com/">Home</a></li>
                        <li id="menu-item-9135" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9135 menu-item-has-children menu-item-has-children--8 has-mega-menu"><a class href="#">Hotel <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu mega-menu mega-9117">
                                <div class="dropdown-menu-inner">
                                    <div class="wpb-content-wrapper">
                                        <div class="vc_row wpb_row st bg-holder">
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="st-mega wpb_column column_container col-md-8">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                            <div class="vc_row wpb_row vc_inner">
                                                                <div class="wpb_column column_container col-md-3">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550627610394">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Listing</strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-listing-hotel" class="menu">
                                                                                    <li id="menu-item-9119" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9119"><a href="https://mixmap.travelerwp.com/search-hotel-popup-map/">Search Popup Map</a></li>
                                                                                    <li id="menu-item-9120" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9120"><a href="https://mixmap.travelerwp.com/search-hotel-half-map/">Search Half Map</a></li>
                                                                                    <li id="menu-item-9121" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9121"><a href="https://mixmap.travelerwp.com/search-hotel-full-map/">Search Full Map</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-3">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550627664152">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Single Detail<br />
                                                                                        </strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-single-hotel" class="menu">
                                                                                    <li id="menu-item-9131" class="menu-item menu-item-type-post_type menu-item-object-st_hotel menu-item-9131"><a href="https://mixmap.travelerwp.com/st_hotel/hyatt-centric-times-square/">Booking At The Sidebar</a></li>
                                                                                    <li id="menu-item-9132" class="menu-item menu-item-type-post_type menu-item-object-st_hotel menu-item-9132"><a href="https://mixmap.travelerwp.com/st_hotel/hotel-wbf-hommachi/">Booking At The Bottom</a></li>
                                                                                    <li id="menu-item-9133" class="menu-item menu-item-type-post_type menu-item-object-st_hotel menu-item-9133"><a href="https://mixmap.travelerwp.com/st_hotel/hotel-wbf-kitasemba/">Top Half-Map</a></li>
                                                                                    <li id="menu-item-9134" class="menu-item menu-item-type-post_type menu-item-object-hotel_room menu-item-9134"><a href="https://mixmap.travelerwp.com/hotel_room/room-kerama-islands/">Top Slider Image</a></li>
                                                                                    <li id="menu-item-10506" class="menu-item menu-item-type-post_type menu-item-object-hotel_room menu-item-10506"><a href="https://mixmap.travelerwp.com/hotel_room/family-suite-3/">Background on Top<span class="new-st-item">New</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-3">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550627670555">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>House</strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-single-house" class="menu">
                                                                                    <li id="menu-item-9129" class="menu-item menu-item-type-post_type menu-item-object-hotel_room menu-item-9129"><a href="https://mixmap.travelerwp.com/hotel_room/standard-room-7/">Top Slider</a></li>
                                                                                    <li id="menu-item-9130" class="menu-item menu-item-type-post_type menu-item-object-hotel_room menu-item-9130"><a href="https://mixmap.travelerwp.com/hotel_room/executive-room-with-lake-view-2/">Background Header</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-3">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                                            <div class="wpb_single_image wpb_content_element vc_align_center wpb_content_element">
                                                                                <figure class="wpb_wrapper vc_figure">
                                                                                    <a href="https://themeforest.net/item/traveler-traveltourbooking-wordpress-theme/10822683?s_rank=3" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img decoding="async" class="vc_single_image-img " src="https://mixmap.travelerwp.com/wp-content/uploads/2019/02/banner_megamenu-165x256.png" width="165" height="256" alt="banner_megamenu" title="banner_megamenu" loading="lazy" /></a>
                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column column_container col-md-4">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li id="menu-item-9109" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9109 menu-item-has-children menu-item-has-children--8 has-mega-menu"><a class href="#">Tour <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu mega-menu mega-9146">
                                <div class="dropdown-menu-inner">
                                    <div class="wpb-content-wrapper">
                                        <div class="vc_row wpb_row st bg-holder">
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="st-mega wpb_column column_container col-md-8">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                            <div class="vc_row wpb_row vc_inner">
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550627725089">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Listing</strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-listing-tour" class="menu">
                                                                                    <li id="menu-item-9136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9136"><a href="https://mixmap.travelerwp.com/top-search-layout-tour/">Top Search Layout</a></li>
                                                                                    <li id="menu-item-9137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9137"><a href="https://mixmap.travelerwp.com/sidebar-search-layout-tour/">Sidebar Search Layout</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550627735652">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Single Detail<br />
                                                                                        </strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-single-tour" class="menu">
                                                                                    <li id="menu-item-9138" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-9138"><a href="https://mixmap.travelerwp.com/st_tour/museum-of-american-history-through-music-tour/">External Booking</a></li>
                                                                                    <li id="menu-item-9140" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-9140"><a href="https://mixmap.travelerwp.com/st_tour/trip-of-new-york-discover-america/">Tour Package</a></li>
                                                                                    <li id="menu-item-11984" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-11984"><a href="https://mixmap.travelerwp.com/st_tour/family-europe-london-to-florence-in-10-days/">Tour Starttime</a></li>
                                                                                    <li id="menu-item-10126" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-10126"><a href="https://mixmap.travelerwp.com/st_tour/museum-of-american-history-through-music-tour-2/">Mapbox<span class="new-st-item">New</span></a></li>
                                                                                    <li id="menu-item-10134" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-10134"><a href="https://mixmap.travelerwp.com/st_tour/10-days-of-vacation-in-florence-resorts-2/">Book &#038; Inquiry Form<span class="new-st-item">New</span></a></li>
                                                                                    <li id="menu-item-10137" class="menu-item menu-item-type-post_type menu-item-object-st_tours menu-item-10137"><a href="https://mixmap.travelerwp.com/st_tour/museum-of-american-history-through-music-tour-2/">Inquiry Form<span class="new-st-item">New</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                                            <div class="wpb_single_image wpb_content_element vc_align_center wpb_content_element">
                                                                                <figure class="wpb_wrapper vc_figure">
                                                                                    <a href="https://themeforest.net/item/traveler-traveltourbooking-wordpress-theme/10822683?s_rank=3" target="_blank" class="vc_single_image-wrapper   vc_box_border_grey"><img decoding="async" class="vc_single_image-img " src="https://mixmap.travelerwp.com/wp-content/uploads/2019/02/banner_megamenu-165x256.png" width="165" height="256" alt="banner_megamenu" title="banner_megamenu" loading="lazy" /></a>
                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column column_container col-md-4">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li id="menu-item-9150" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9150 menu-item-has-children menu-item-has-children--8 has-mega-menu"><a class href="#">Activity <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu mega-menu mega-9148">
                                <div class="dropdown-menu-inner">
                                    <div class="wpb-content-wrapper">
                                        <div class="vc_row wpb_row st bg-holder">
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="st-mega wpb_column column_container col-md-8">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                            <div class="vc_row wpb_row vc_inner">
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550628130567">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Listing</strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-listing-activity" class="menu">
                                                                                    <li id="menu-item-9141" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9141"><a href="https://mixmap.travelerwp.com/top-search-layout-activity/">Top Search Layout</a></li>
                                                                                    <li id="menu-item-9142" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9142"><a href="https://mixmap.travelerwp.com/sidebar-search-layout-activity/">Sidebar Search Layout</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550628142124">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Single Detail<br />
                                                                                        </strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-single-activity" class="menu">
                                                                                    <li id="menu-item-9143" class="menu-item menu-item-type-post_type menu-item-object-st_activity menu-item-9143"><a href="https://mixmap.travelerwp.com/st_activity/national-parks-tour-one-days-2-5-2-2-2/">Full Header</a></li>
                                                                                    <li id="menu-item-9144" class="menu-item menu-item-type-post_type menu-item-object-st_activity menu-item-9144"><a href="https://mixmap.travelerwp.com/st_activity/national-parks-tour-one-days-2-5-2-2/">Image Slider</a></li>
                                                                                    <li id="menu-item-9145" class="menu-item menu-item-type-post_type menu-item-object-st_activity menu-item-9145"><a href="https://mixmap.travelerwp.com/st_activity/national-parks-tour-one-days-2-5-3/">Boxed Layout</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                                            <div class="wpb_single_image wpb_content_element vc_align_center wpb_content_element">
                                                                                <figure class="wpb_wrapper vc_figure">
                                                                                    <a href="https://themeforest.net/item/traveler-traveltourbooking-wordpress-theme/10822683?s_rank=3" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img decoding="async" class="vc_single_image-img " src="https://mixmap.travelerwp.com/wp-content/uploads/2019/02/banner_megamenu-165x256.png" width="165" height="256" alt="banner_megamenu" title="banner_megamenu" loading="lazy" /></a>
                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column column_container col-md-4">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li id="menu-item-9616" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9616 menu-item-has-children menu-item-has-children--8 has-mega-menu"><a class href="#">Rental <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-menu mega-menu mega-9621">
                                <div class="dropdown-menu-inner">
                                    <div class="wpb-content-wrapper">
                                        <div class="vc_row wpb_row st bg-holder">
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="st-mega wpb_column column_container col-md-8">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                            <div class="vc_row wpb_row vc_inner">
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550628130567">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Listing</strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-listing-rental" class="menu">
                                                                                    <li id="menu-item-9623" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9623"><a href="https://mixmap.travelerwp.com/rental-popup-search/">Rental Popup Search</a></li>
                                                                                    <li id="menu-item-9624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9624"><a href="https://mixmap.travelerwp.com/rental-halfmap-search/">Rental Half-Map Search</a></li>
                                                                                    <li id="menu-item-9627" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9627"><a href="https://mixmap.travelerwp.com/rental-fullmap-search/">Rental Full-Map Search</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="wpb_text_column wpb_content_element vc_custom_1550628142124">
                                                                                <div class="wpb_wrapper">
                                                                                    <p><strong>Single Detail<br />
                                                                                        </strong></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget widget_nav_menu">
                                                                                <ul id="menu-mega-single-rental" class="menu">
                                                                                    <li id="menu-item-9629" class="menu-item menu-item-type-post_type menu-item-object-st_rental menu-item-9629"><a href="https://mixmap.travelerwp.com/st_rental/spacious-3-bedrooms-apt-near-champs-elysees-avenue/">Top Background</a></li>
                                                                                    <li id="menu-item-9630" class="menu-item menu-item-type-post_type menu-item-object-st_rental menu-item-9630"><a href="https://mixmap.travelerwp.com/st_rental/new-year-sale-stylish-2-bedrooms-in-exclusive-chelsea-neighborhood/">Top Slider</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpb_column column_container col-md-4">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                                            <div class="wpb_single_image wpb_content_element vc_align_center wpb_content_element">
                                                                                <figure class="wpb_wrapper vc_figure">
                                                                                    <a href="https://themeforest.net/item/traveler-traveltourbooking-wordpress-theme/10822683?s_rank=3" target="_self" class="vc_single_image-wrapper   vc_box_border_grey"><img decoding="async" class="vc_single_image-img " src="https://mixmap.travelerwp.com/wp-content/uploads/2019/02/banner_megamenu-165x256.png" width="165" height="256" alt="banner_megamenu" title="banner_megamenu" loading="lazy" /></a>
                                                                                </figure>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column column_container col-md-4">
                                                        <div class="vc_column-inner wpb_wrapper">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li id="menu-item-9620" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9620"><a class href="#">Car</a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="menu-dropdown">
                                <li id="menu-item-9634" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9634"><a class href="https://mixmap.travelerwp.com/car-top-search/">Car Top Search</a></li>
                                <li id="menu-item-9635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9635"><a class href="https://mixmap.travelerwp.com/car-search-sidebar/">Car Sidebar Search</a></li>
                                <li id="menu-item-9636" class="menu-item menu-item-type-post_type menu-item-object-st_cars menu-item-9636"><a class href="https://mixmap.travelerwp.com/st_car/lamborghini/">Single Style</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-9637" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-9637"><a class href="#">Pages</a>
                            <i class="fa fa-angle-down"></i>
                            <ul class="menu-dropdown">
                                <li id="menu-item-10919" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10919"><a class href="https://mixmap.travelerwp.com/author/travelhotel/">Author Profile</a></li>
                                <li id="menu-item-9176" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9176"><a class href="https://mixmap.travelerwp.com/become-local-expert/">Become Local Expert</a></li>
                                <li id="menu-item-10125" class="menu-item menu-item-type-post_type menu-item-object-location menu-item-10125"><a class href="https://mixmap.travelerwp.com/st_location/united-states/">Destination<span class="new-st-item">New</span></a></li>
                                <li id="menu-item-8047" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8047"><a class href="https://mixmap.travelerwp.com/about-us/">About Us</a></li>
                                <li id="menu-item-9175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9175"><a class href="https://mixmap.travelerwp.com/faqs/">FAQs</a></li>
                                <li id="menu-item-8048" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8048"><a class href="https://mixmap.travelerwp.com/not-found/">404 Page</a></li>
                                <li id="menu-item-8090" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8090"><a class href="https://mixmap.travelerwp.com/contact/">Contact</a></li>
                                <li id="menu-item-8027" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8027"><a class href="https://mixmap.travelerwp.com/blog/">Blog</a></li>
                                <li id="menu-item-16892" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16892"><a class href="https://mixmap.travelerwp.com/font/">Font Icons</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <ul class="st-list">
                    <li class="dropdown dropdown-minicart">
                        <div id="d-minicart" class="mini-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="26px" height="26px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g id="ico_card" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(1.000000, 0.000000)" stroke="#fff" stroke-width="1.5">
                                            <g id="shopping-basket-handle">
                                                <path d="M17.936,23.25 L4.064,23.25 C3.39535169,23.2378444 2.82280366,22.7675519 2.681,22.114 L0.543,13.114 C0.427046764,12.67736 0.516308028,12.2116791 0.785500181,11.8488633 C1.05469233,11.4860476 1.47449596,11.2656135 1.926,11.25 L20.074,11.25 C20.525504,11.2656135 20.9453077,11.4860476 21.2144998,11.8488633 C21.483692,12.2116791 21.5729532,12.67736 21.457,13.114 L19.319,22.114 C19.1771963,22.7675519 18.6046483,23.2378444 17.936,23.25 Z"></path>
                                                <path d="M6.5,14.25 L6.5,20.25"></path>
                                                <path d="M11,14.25 L11,20.25"></path>
                                                <path d="M15.5,14.25 L15.5,20.25"></path>
                                                <path d="M8,2.006 C5.190705,2.90246789 3.1556158,5.34590097 2.782,8.271"></path>
                                                <path d="M19.221,8.309 C18.8621965,5.36812943 16.822685,2.90594951 14,2.006"></path>
                                                <rect id="Rectangle-path" x="8" y="0.75" width="6" height="3" rx="1.125"></rect>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="d-minicart">
                            <li class="heading">
                                <h4 class="st-heading-section">Your Cart</h4>
                            </li>
                            <li>
                                <div class="col-lg-12 cart-text-empty text-warning">Your cart is empty</div>
                            </li>
                        </ul>
                    </li>
                    <li class="st-header-link"><a href="https://mixmap.travelerwp.com/become-local-expert/"> <i class="fa  mr5"></i>Become Local Expert</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="st-content-wrapper">
        <div class="blog-header" style="background-image: url(https://travelhotel.wpengine.com/wp-content/uploads/2018/12/united.jpg)">
            <div class="container">
                <h2 class="blog-header-title">Blog</h2>
            </div>
        </div>
        <div class="st-breadcrumb hidden-xs ">
            <div class="container">
                <ul>
                    <li><a href="https://mixmap.travelerwp.com">Home</a></li>
                    <li><a href="https://mixmap.travelerwp.com/category/beauty-beaches/">Beauty beaches</a></li>
                    <li class="active">All Aboard the Rocky Mountaineer</li>
                </ul>
            </div>
        </div>
        <div class=" st-blog ">
            <div class="container">
                <div class="blog-content content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-9">
                            <div class="article">
                                <div class="header">
                                    <header class="post-header">
                                        <div class="st-gallery" data-width="100%" data-nav="false" data-allowfullscreen="true">
                                            <div class="fotorama" data-auto="false">
                                                <img width="870" height="500" src="<?php echo isset($post['thumbnail']) ? '/uploads/post_thumbnail/' . $post['thumbnail'] :  'https://picsum.photos/seed/picsum/200/300' ?>" class="attachment-870x500 size-870x500" alt decoding="async" fetchpriority="high" />
                                            </div>
                                        </div>
                                    </header>
                                    <div class="cate">
                                        <ul>
                                            <li style="background: #eb4d4b"><a href="https://mixmap.travelerwp.com/category/beauty-beaches/">Beauty beaches</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h2 class="title"><?php echo $post['title'] ?></h2>
                                <div class="post-info">
                                    <span class="date">
                                        Nov 30, 2018 </span>
                                    <span class="count-comment">
                                        1 comment </span>
                                </div>
                                <div class="post-content">
                                    <p><?php echo $post['content'] ?></p>
                                </div>
                                <div class="st-flex space-between">
                                    <div class="tags">
                                        <a href="https://mixmap.travelerwp.com/tag/mountains/" class="tag-item">Mountains</a>
                                        <a href="https://mixmap.travelerwp.com/tag/museums/" class="tag-item">Museums</a>
                                    </div>
                                    <div class="share">
                                        Share <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u=https://mixmap.travelerwp.com/all-aboard-the-rocky-mountaineer/&amp;title=All Aboard the Rocky Mountaineer" target="_blank" rel="noopener" original-title="Facebook"><i class="fa fa-facebook fa-lg"></i></a>
                                        <a class="twitter share-item" href="https://twitter.com/share?url=https://mixmap.travelerwp.com/all-aboard-the-rocky-mountaineer/&amp;title=All Aboard the Rocky Mountaineer" target="_blank" rel="noopener" original-title="Twitter"><i class="fa fa-twitter fa-lg"></i></a>
                                    </div>
                                </div>
                                <div class="author-info">
                                    <div class="media">
                                        <div class="media-left">
                                            <img alt="avatar" width="100" height="100" src="https://mixmap.travelerwp.com/wp-content/uploads/2020/01/pp_1-200x200.png" class="avatar avatar-96 photo origin round">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Traveler</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination clearfix">
                                    <nav class="navigation post-navigation" aria-label="Posts">
                                        <h2 class="screen-reader-text">Post navigation</h2>
                                        <div class="nav-links">
                                            <div class="nav-previous"><a href="https://mixmap.travelerwp.com/the-castle-on-the-cliff-majestic-magic-manoir/" rel="prev"><span class="meta-nav" aria-hidden="true"><i class="fa fa-angle-left"></i>Previous</span> </a></div>
                                            <div class="nav-next"><a href="https://mixmap.travelerwp.com/pure-luxe-in-punta-mita/" rel="next"><span class="meta-nav" aria-hidden="true">Next</span> <i class="fa fa-angle-right"></i></a></div>
                                        </div>
                                    </nav>
                                </div>
                                <div id="comment-wrapper">
                                    <h2 class="title">Comment (1)</h2>
                                    <ol class="comment-list">
                                        <li id="comment-150" class="st_reviews byuser comment-author-travelhotel bypostauthor even thread-even depth-1">
                                            <div id="div-comment-150" class="article comment  clearfix" inline_comment="comment">
                                                <div class="comment-item-head">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img alt="avatar" width="50" height="50" src="https://mixmap.travelerwp.com/wp-content/uploads/2020/01/pp_1-200x200.png" class="avatar avatar-96 photo origin round">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">Traveler</div>
                                                            <div class="date">04/12/2018</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-item-body">
                                                    <div class="comment-content">
                                                        <p>The UK summer is synonymous with muddy festivals. This means buying adequate clothing, camping gear and waterproof wellies.</p>
                                                    </div>
                                                    <span class="comment-reply">
                                                        <a rel="nofollow" class="comment-reply-login" href="https://mixmap.travelerwp.com/wp-login.php?redirect_to=https%3A%2F%2Fmixmap.travelerwp.com%2Fall-aboard-the-rocky-mountaineer%2F">Log in to Reply</a> </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <div id="write-comment">
                                        <div id="respond" class="comment-respond ">
                                            <h3 id="reply-title" class="comment-reply-title">Leave a Comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="/all-aboard-the-rocky-mountaineer/#respond" style="display:none;">Cancel reply</a></small></h3>
                                            <p class="must-log-in">You must be <a href="https://mixmap.travelerwp.com/wp-login.php?redirect_to=https%3A%2F%2Fmixmap.travelerwp.com%2Fall-aboard-the-rocky-mountaineer%2F">logged in</a> to post a comment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-3">

                            <aside class="sidebar-right">
                                <div id="search-4" class="sidebar-widget widget_search">
                                    <form role="search" method="get" class="search" action="https://mixmap.travelerwp.com/">
                                        <input type="text" class="form-control" value name="s" placeholder="Search ...">
                                        <input type="hidden" name="post_type" value="post">
                                        <button type="submit"><i class="input-icon st-border-radius field-icon fa"><svg height="15px" width="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                                    <g fill="#ffffff">
                                                        <path d="M23.245,23.996c-0.2,0-0.389-0.078-0.53-0.22L16.2,17.26c-0.761,0.651-1.618,1.182-2.553,1.579
        c-1.229,0.522-2.52,0.787-3.837,0.787c-1.257,0-2.492-0.241-3.673-0.718c-2.431-0.981-4.334-2.849-5.359-5.262
        c-1.025-2.412-1.05-5.08-0.069-7.51S3.558,1.802,5.97,0.777C7.199,0.254,8.489-0.01,9.807-0.01c1.257,0,2.492,0.242,3.673,0.718
        c2.431,0.981,4.334,2.849,5.359,5.262c1.025,2.413,1.05,5.08,0.069,7.51c-0.402,0.996-0.956,1.909-1.649,2.718l6.517,6.518
        c0.292,0.292,0.292,0.768,0,1.061C23.634,23.918,23.445,23.996,23.245,23.996z M9.807,1.49c-1.115,0-2.209,0.224-3.25,0.667
        C4.513,3.026,2.93,4.638,2.099,6.697c-0.831,2.059-0.81,4.318,0.058,6.362c0.869,2.044,2.481,3.627,4.54,4.458
        c1.001,0.404,2.048,0.608,3.112,0.608c1.115,0,2.209-0.224,3.25-0.667c0.974-0.414,1.847-0.998,2.594-1.736
        c0.01-0.014,0.021-0.026,0.032-0.037c0.016-0.016,0.031-0.029,0.045-0.039c0.763-0.771,1.369-1.693,1.786-2.728
        c0.831-2.059,0.81-4.318-0.059-6.362c-0.868-2.044-2.481-3.627-4.54-4.458C11.918,1.695,10.871,1.49,9.807,1.49z" />
                                                    </g>
                                                </svg></i></button>
                                    </form>
                                </div>
                                <div id="text-2" class="sidebar-widget widget_text"><label class="h4">ABOUT US</label>
                                    <div class="textwidget">
                                        <p><img loading="lazy" decoding="async" class="alignnone wp-image-8013 size-full" src="https://travelhotel.wpengine.com/wp-content/uploads/2018/11/about_1.jpg" alt width="270" height="151" srcset="https://mixmap.travelerwp.com/wp-content/uploads/2018/11/about_1.jpg 270w, https://mixmap.travelerwp.com/wp-content/uploads/2018/11/about_1-600x335.jpg 600w, https://mixmap.travelerwp.com/wp-content/uploads/2018/11/about_1-768x429.jpg 768w" sizes="(max-width: 270px) 100vw, 270px" /></p>
                                        <p>Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum, neque sem pretium metus, quis mollis nisl nunc et massa</p>
                                    </div>
                                </div>
                                <div id="tag_cloud-2" class="sidebar-widget widget_tag_cloud"><label class="h4">TAGS</label>
                                    <div class="tagcloud"><a href="https://mixmap.travelerwp.com/tag/beaches/" class="tag-cloud-link tag-link-103 tag-link-position-1" style="font-size: 22pt;" aria-label="beaches (2 items)">beaches</a>
                                        <a href="https://mixmap.travelerwp.com/tag/beauty/" class="tag-cloud-link tag-link-104 tag-link-position-2" style="font-size: 22pt;" aria-label="Beauty (2 items)">Beauty</a>
                                        <a href="https://mixmap.travelerwp.com/tag/carnivals/" class="tag-cloud-link tag-link-100 tag-link-position-3" style="font-size: 22pt;" aria-label="Carnivals (2 items)">Carnivals</a>
                                        <a href="https://mixmap.travelerwp.com/tag/cultural/" class="tag-cloud-link tag-link-105 tag-link-position-4" style="font-size: 22pt;" aria-label="Cultural (2 items)">Cultural</a>
                                        <a href="https://mixmap.travelerwp.com/tag/mountains/" class="tag-cloud-link tag-link-36 tag-link-position-5" style="font-size: 8pt;" aria-label="Mountains (1 item)">Mountains</a>
                                        <a href="https://mixmap.travelerwp.com/tag/museums/" class="tag-cloud-link tag-link-106 tag-link-position-6" style="font-size: 8pt;" aria-label="Museums (1 item)">Museums</a>
                                        <a href="https://mixmap.travelerwp.com/tag/national/" class="tag-cloud-link tag-link-101 tag-link-position-7" style="font-size: 22pt;" aria-label="National (2 items)">National</a>
                                        <a href="https://mixmap.travelerwp.com/tag/parks/" class="tag-cloud-link tag-link-102 tag-link-position-8" style="font-size: 22pt;" aria-label="Parks (2 items)">Parks</a>
                                        <a href="https://mixmap.travelerwp.com/tag/tiptoe/" class="tag-cloud-link tag-link-97 tag-link-position-9" style="font-size: 8pt;" aria-label="Tiptoe (1 item)">Tiptoe</a>
                                        <a href="https://mixmap.travelerwp.com/tag/tulips/" class="tag-cloud-link tag-link-98 tag-link-position-10" style="font-size: 8pt;" aria-label="Tulips (1 item)">Tulips</a>
                                        <a href="https://mixmap.travelerwp.com/tag/washington/" class="tag-cloud-link tag-link-99 tag-link-position-11" style="font-size: 8pt;" aria-label="Washington (1 item)">Washington</a>
                                    </div>
                                </div>
                                <div id="tag_cloud-4" class="sidebar-widget widget_tag_cloud"><label class="h4">Activity Types</label>
                                    <div class="tagcloud"><a href="https://mixmap.travelerwp.com/activity_types/food-nightlife/" class="tag-cloud-link tag-link-168 tag-link-position-1" style="font-size: 8pt;" aria-label="Food &amp; Nightlife (19 items)">Food &amp; Nightlife</a>
                                        <a href="https://mixmap.travelerwp.com/activity_types/ourdoors/" class="tag-cloud-link tag-link-169 tag-link-position-2" style="font-size: 8pt;" aria-label="Ourdoors (19 items)">Ourdoors</a>
                                        <a href="https://mixmap.travelerwp.com/activity_types/sightseeing-tours/" class="tag-cloud-link tag-link-170 tag-link-position-3" style="font-size: 22pt;" aria-label="Sightseeing Tours (20 items)">Sightseeing Tours</a>
                                        <a href="https://mixmap.travelerwp.com/activity_types/workshops-classes/" class="tag-cloud-link tag-link-171 tag-link-position-4" style="font-size: 8pt;" aria-label="Workshops (19 items)">Workshops</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="main-footer" class="clearfix  ">
        <div class="wpb-content-wrapper">
            <div id="signup" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row st bg-holder vc_custom_1680159868644 vc_row-has-fill vc_row-no-padding">
                <div class="container-fluid">
                    <div class="row">
                        <div class="wpb_column column_container col-md-12">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="mailchimp">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                                                <div class="row">
                                                    <div class="col-xs-12  col-md-7 col-lg-6">
                                                        <div class="media ">
                                                            <div class="media-left pr30 hidden-xs">
                                                                <img decoding="async" class="media-object st_1722046918" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/images/svg/ico_email_subscribe.svg" alt>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading st-heading-section f24">Get Updates &amp; More</h4>
                                                                <p class="f16 c-grey">Thoughtful thoughts to your inbox</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-5 col-lg-6">
                                                        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                                        <script>
                                                            (function() {
                                                                window.mc4wp = window.mc4wp || {
                                                                    listeners: [],
                                                                    forms: {
                                                                        on: function(evt, cb) {
                                                                            window.mc4wp.listeners.push({
                                                                                event: evt,
                                                                                callback: cb
                                                                            });
                                                                        }
                                                                    }
                                                                }
                                                            })();
                                                        </script>
                                                        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-5763" method="post" data-id="5763" data-name>
                                                            <div class="mc4wp-form-fields">
                                                                <div class="subcribe-form">
                                                                    <div class="form-group">
                                                                        <input type="email" name="EMAIL" class="form-control" placeholder="Your Email">
                                                                        <input type="submit" name="submit" value="Subcribe">
                                                                    </div>
                                                                </div>
                                                            </div><label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value tabindex="-1" autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp" value="1722046917" /><input type="hidden" name="_mc4wp_form_id" value="5763" /><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
                                                            <div class="mc4wp-response"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
            <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row st bg-holder vc_custom_1542265299369 vc_row-has-fill">
                <div class="container ">
                    <div class="row">
                        <div class="wpb_column column_container col-md-3">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1543220007372">
                                    <div class="wpb_wrapper">
                                        <h4 style="font-size: 14px;">NEED HELP?</h4>
                                    </div>
                                </div>
                                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_40 vc_sep_pos_align_left vc_separator_no_text wpb_content_element  wpb_content_element"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span>
                                </div>
                                <div class="wpb_text_column wpb_content_element vc_custom_1543221092622">
                                    <div class="wpb_wrapper">
                                        <p><span style="color: #5e6d77;">Call Us</span></p>
                                        <h4>+ 00 222 44 5678</h4>
                                    </div>
                                </div>
                                <div class="wpb_text_column wpb_content_element vc_custom_1543221080532">
                                    <div class="wpb_wrapper">
                                        <p><span style="color: #5e6d77;">Email for Us</span></p>
                                        <h4><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c1a9a4adadae81b8aeb4b3b2a8b5a4efa2aeac">[email&#160;protected]</a></h4>
                                    </div>
                                </div>
                                <div class="wpb_text_column wpb_content_element vc_custom_1544512778823">
                                    <div class="wpb_wrapper">
                                        <p><span style="color: #5e6d77; margin-bottom: 5px;">Follow Us<br />
                                            </span></p>
                                        <p><a style="margin-right: 20px;" href="#"><img loading="lazy" decoding="async" class="alignnone wp-image-7794 size-full" src="https://travelhotel.wpengine.com/wp-content/uploads/2018/12/ico_facebook_footer.png" alt width="21" height="25" /></a><a style="margin-right: 20px;" href="#"><img loading="lazy" decoding="async" class="alignnone wp-image-7795 size-full" src="https://travelhotel.wpengine.com/wp-content/uploads/2018/12/ico_twitter_footer.png" alt width="32" height="24" /></a><a style="margin-right: 20px;" href="#"><img loading="lazy" decoding="async" class="alignnone wp-image-7796 size-full" src="https://travelhotel.wpengine.com/wp-content/uploads/2018/12/ico_instagram_footer.png" alt width="24" height="22" /></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column column_container col-md-3">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1543220015251">
                                    <div class="wpb_wrapper">
                                        <h4 style="font-size: 14px;">COMPANY</h4>
                                    </div>
                                </div>
                                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_40 vc_sep_pos_align_left vc_separator_no_text wpb_content_element  wpb_content_element"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span>
                                </div>
                                <div class="vc_wp_custommenu wpb_content_element">
                                    <div class="widget widget_nav_menu">
                                        <div class="menu-footer-new-container">
                                            <ul id="menu-footer-new" class="menu">
                                                <li id="menu-item-8049" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8049"><a href="#">About Us</a></li>
                                                <li id="menu-item-8050" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8050"><a href="#">Community Blog</a></li>
                                                <li id="menu-item-8051" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8051"><a href="#">Rewards</a></li>
                                                <li id="menu-item-8052" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8052"><a href="#">Work with Us</a></li>
                                                <li id="menu-item-8053" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8053"><a href="#">Meet the Team</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column column_container col-md-3">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1543220022219">
                                    <div class="wpb_wrapper">
                                        <h4 style="font-size: 14px;">SUPPORT</h4>
                                    </div>
                                </div>
                                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_40 vc_sep_pos_align_left vc_separator_no_text wpb_content_element  wpb_content_element"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span>
                                </div>
                                <div class="vc_wp_custommenu wpb_content_element">
                                    <div class="widget widget_nav_menu">
                                        <div class="menu-footer-new-2-container">
                                            <ul id="menu-footer-new-2" class="menu">
                                                <li id="menu-item-8054" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8054"><a href="#">Account</a></li>
                                                <li id="menu-item-8055" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8055"><a href="#">Legal</a></li>
                                                <li id="menu-item-8056" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8056"><a href="#">Contact</a></li>
                                                <li id="menu-item-8057" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8057"><a href="#">Affiliate Program</a></li>
                                                <li id="menu-item-8058" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8058"><a href="#">Privacy Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column column_container col-md-3">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1543220028834">
                                    <div class="wpb_wrapper">
                                        <h4 style="font-size: 14px;">SETTING</h4>
                                    </div>
                                </div>
                                <div class="vc_separator wpb_content_element vc_separator_align_center vc_sep_width_40 vc_sep_pos_align_left vc_separator_no_text wpb_content_element  wpb_content_element"><span class="vc_sep_holder vc_sep_holder_l"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span><span class="vc_sep_holder vc_sep_holder_r"><span style="border-color:#eaeaea;" class="vc_sep_line"></span></span>
                                </div>
                                <div class="form-group ">
                                    <label class="block f14 c-grey font-normal">Currencies</label>
                                    <select name="currency" class=" f14 select2-currencies">
                                        <option selected="selected" value="USD" data-target="/all-aboard-the-rocky-mountaineer/?currency=USD">USD</option>
                                        <option value="EUR" data-target="/all-aboard-the-rocky-mountaineer/?currency=EUR">EUR</option>
                                        <option value="AUD" data-target="/all-aboard-the-rocky-mountaineer/?currency=AUD">AUD</option>
                                        <option value="COP" data-target="/all-aboard-the-rocky-mountaineer/?currency=COP">COP</option>
                                        <option value="AED" data-target="/all-aboard-the-rocky-mountaineer/?currency=AED">AED</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row-full-width vc_clearfix"></div>
        </div>
    </footer>
    <div class="container main-footer-sub">
        <div class="st-flex space-between">
            <div class="left mt20">
                <div class="f14">
                    Copyright © 2024 by <a href="https://mixmap.travelerwp.com/" class="st-link">Traveler Theme</a>
                </div>
            </div>
            <div class="right mt20">
                <img width="240" height="40" src="https://mixmap.travelerwp.com/wp-content/uploads/2018/11/cards.png" alt="Trust badges" class="img-responsive st_trustbase st_1722046919">
            </div>
        </div>
    </div>
    <div class="modal fade login-regiter-popup" id="st-login-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 450px;">
            <div class="modal-content relative">
                <div class="loader-wrapper">
                    <div class="st-loader"></div>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="input-icon st-border-radius field-icon fa"><svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <defs></defs>
                                <g id="Ico_close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                    <g stroke="#1A2B48" stroke-width="1.5">
                                        <g id="close">
                                            <path d="M0.75,23.249 L23.25,0.749"></path>
                                            <path d="M23.25,23.249 L0.75,0.749"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></i> </button>
                    <div class="modal-title">Log In</div>
                </div>
                <div class="modal-body relative">
                    <div class="map-loading" style="display:none">
                    </div>
                    <form action="#" class="form" method="post">
                        <input type="hidden" name="st_theme_style" value="modern" />
                        <input type="hidden" name="action" value="st_login_popup">
                        <input type="hidden" name="post_id" value="8007">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Email or Username">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="18px" viewBox="0 0 24 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-912.000000, -220.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 119.000000)">
                                                    <g transform="translate(416.000000, 22.000000)">
                                                        <g id="ico_email_login_form">
                                                            <rect id="Rectangle-path" x="0.5" y="0.0101176471" width="23" height="16.9411765" rx="2"></rect>
                                                            <polyline points="22.911 0.626352941 12 10.0689412 1.089 0.626352941"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group field-password ic-view">
                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="16px" viewBox="0 0 18 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-918.000000, -307.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 209.000000)">
                                                    <g transform="translate(422.000000, 18.000000)">
                                                        <g id="ico_pass_login_form">
                                                            <path d="M3.5,6 C3.5,2.96243388 5.96243388,0.5 9,0.5 C12.0375661,0.5 14.5,2.96243388 14.5,6 L14.5,9.5"></path>
                                                            <path d="M17.5,11.5 C17.5,10.3954305 16.6045695,9.5 15.5,9.5 L2.5,9.5 C1.3954305,9.5 0.5,10.3954305 0.5,11.5 L0.5,21.5 C0.5,22.6045695 1.3954305,23.5 2.5,23.5 L15.5,23.5 C16.6045695,23.5 17.5,22.6045695 17.5,21.5 L17.5,11.5 Z"></path>
                                                            <circle cx="9" cy="16.5" r="1.25"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-submit" value="Log In">
                        </div>
                        <div class="message-wrapper mt20"></div>
                        <div class="mt20 st-flex space-between st-icheck">
                            <div class="st-icheck-item">
                                <label for="remember-me" class="c-grey">
                                    <input type="checkbox" name="remember" id="remember-me" value="1"> Remember me <span class="checkmark fcheckbox"></span>
                                </label>
                            </div>
                            <a href="#" class="st-link open-loss-password" data-toggle="modal">Forgot Password?</a>
                        </div>
                        <div class="mt20 c-grey font-medium f14 text-center">
                            Do not have an account? <a href="#" class="st-link open-signup" data-toggle="modal">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade login-regiter-popup" id="st-register-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 520px;">
            <div class="modal-content relative">
                <div class="loader-wrapper">
                    <div class="st-loader"></div>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="input-icon st-border-radius field-icon fa"><svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <defs></defs>
                                <g id="Ico_close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                    <g stroke="#1A2B48" stroke-width="1.5">
                                        <g id="close">
                                            <path d="M0.75,23.249 L23.25,0.749"></path>
                                            <path d="M23.25,23.249 L0.75,0.749"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></i> </button>
                    <div class="modal-title">Sign Up</div>
                </div>
                <div class="modal-body">
                    <div class="map-loading" style="display:none">
                    </div>
                    <form action="#" class="form" method="post">
                        <input type="hidden" name="st_theme_style" value="modern" />
                        <input type="hidden" name="action" value="st_registration_popup">
                        <input type="hidden" name="post_id" value="8007">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" autocomplete="off" placeholder="Username *">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-912.000000, -207.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 109.000000)">
                                                    <g id="ico_username_form_signup" transform="translate(416.000000, 18.000000)">
                                                        <g id="Light">
                                                            <circle cx="12" cy="12" r="11.5"></circle>
                                                            <path d="M8.338,6.592 C10.3777315,8.7056567 13.5128387,9.33602311 16.211,8.175"></path>
                                                            <circle cx="12" cy="8.75" r="4.25"></circle>
                                                            <path d="M18.317,18.5 C17.1617209,16.0575309 14.7019114,14.4999182 12,14.4999182 C9.29808863,14.4999182 6.83827906,16.0575309 5.683,18.5"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" autocomplete="off" placeholder="Full Name">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="20px" viewBox="0 0 23 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-914.000000, -295.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 199.000000)">
                                                    <g transform="translate(418.000000, 17.000000)">
                                                        <g id="ico_fullname_signup">
                                                            <path d="M14.5,23.5 L14.5,20.5 L15.5,20.5 C17.1568542,20.5 18.5,19.1568542 18.5,17.5 L18.5,14.5 L21.313,14.5 C21.4719994,14.4989403 21.6210158,14.4223193 21.7143842,14.2936169 C21.8077526,14.1649146 21.8343404,13.9994766 21.786,13.848 C19.912,8.048 18.555,1.813 12.366,0.681 C9.63567371,0.151893606 6.80836955,0.784892205 4.56430871,2.42770265 C2.32024786,4.07051309 0.862578016,6.57441697 0.542,9.337 C0.21983037,12.7556062 1.72416582,16.0907612 4.5,18.112 L4.5,23.5"></path>
                                                            <path d="M7.5,8 C7.49875423,6.44186837 8.69053402,5.14214837 10.2429354,5.00863533 C11.7953368,4.87512228 13.1915367,5.95226513 13.4563532,7.48772858 C13.7211696,9.02319203 12.7664402,10.5057921 11.259,10.9 C10.8242888,10.9952282 10.5108832,11.3751137 10.5,11.82 L10.5,13.5"></path>
                                                            <path d="M10.5,15.5 C10.6380712,15.5 10.75,15.6119288 10.75,15.75 C10.75,15.8880712 10.6380712,16 10.5,16 C10.3619288,16 10.25,15.8880712 10.25,15.75 C10.25,15.6119288 10.3619288,15.5 10.5,15.5"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email *">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="18px" viewBox="0 0 24 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-912.000000, -220.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 119.000000)">
                                                    <g transform="translate(416.000000, 22.000000)">
                                                        <g id="ico_email_login_form">
                                                            <rect id="Rectangle-path" x="0.5" y="0.0101176471" width="23" height="16.9411765" rx="2"></rect>
                                                            <polyline points="22.911 0.626352941 12 10.0689412 1.089 0.626352941"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group field-password ic-view">
                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password *">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="16px" viewBox="0 0 18 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-918.000000, -307.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 209.000000)">
                                                    <g transform="translate(422.000000, 18.000000)">
                                                        <g id="ico_pass_login_form">
                                                            <path d="M3.5,6 C3.5,2.96243388 5.96243388,0.5 9,0.5 C12.0375661,0.5 14.5,2.96243388 14.5,6 L14.5,9.5"></path>
                                                            <path d="M17.5,11.5 C17.5,10.3954305 16.6045695,9.5 15.5,9.5 L2.5,9.5 C1.3954305,9.5 0.5,10.3954305 0.5,11.5 L0.5,21.5 C0.5,22.6045695 1.3954305,23.5 2.5,23.5 L15.5,23.5 C16.6045695,23.5 17.5,22.6045695 17.5,21.5 L17.5,11.5 Z"></path>
                                                            <circle cx="9" cy="16.5" r="1.25"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group">
                            <p class="f14 c-grey">Select User Type</p>
                            <label class="block" for="normal-user">
                                <input checked id="normal-user" type="radio" class="mr5" name="register_as" value="normal"> <span class="c-main" data-toggle="tooltip" data-placement="right" title="Used for booking services">Normal User</span>
                            </label>
                            <label class="block" for="partner-user">
                                <input id="partner-user" type="radio" class="mr5" name="register_as" value="partner">
                                <span class="c-main" data-toggle="tooltip" data-placement="right" title="Used for upload and booking services">Partner User</span>
                            </label>
                        </div>
                        <div class="form-group st-icheck-item">
                            <label for="term">
                                <input id="term" type="checkbox" name="term" class="mr5"> I have read and accept the <a class="st-link" href="https://mixmap.travelerwp.com/all-aboard-the-rocky-mountaineer/">Terms and Privacy Policy</a> <span class="checkmark fcheckbox"></span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-submit" value="Sign Up">
                        </div>
                        <div class="message-wrapper mt20"></div>
                        <div class="mt20 c-grey f14 text-center">
                            Already have an account? <a href="#" class="st-link open-login" data-toggle="modal">Log In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="st-forgot-form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 450px;">
            <div class="modal-content">
                <div class="loader-wrapper">
                    <div class="st-loader"></div>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="input-icon st-border-radius field-icon fa"><svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                <defs></defs>
                                <g id="Ico_close" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                    <g stroke="#1A2B48" stroke-width="1.5">
                                        <g id="close">
                                            <path d="M0.75,23.249 L23.25,0.749"></path>
                                            <path d="M23.25,23.249 L0.75,0.749"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></i> </button>
                    <div class="modal-title">Reset Password</div>
                </div>
                <div class="modal-body">
                    <form action="#" class="form" method="post">
                        <input type="hidden" name="st_theme_style" value="modern" />
                        <input type="hidden" name="action" value="st_reset_password">
                        <p class="c-grey f14">
                            Enter the e-mail address associated with the account. <br />
                            We'll e-mail a link to reset your password. </p>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <i class="input-icon st-border-radius field-icon fa"><svg width="24px" height="24px" viewBox="0 0 24 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                    <defs></defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g transform="translate(-912.000000, -220.000000)" stroke="#A0A9B2">
                                            <g transform="translate(466.000000, 80.000000)">
                                                <g transform="translate(30.000000, 119.000000)">
                                                    <g transform="translate(416.000000, 22.000000)">
                                                        <g id="ico_email_login_form">
                                                            <rect id="Rectangle-path" x="0.5" y="0.0101176471" width="23" height="16.9411765" rx="2"></rect>
                                                            <polyline points="22.911 0.626352941 12 10.0689412 1.089 0.626352941"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg></i>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-submit" value="Send Reset Link">
                        </div>
                        <div class="message-wrapper mt20"></div>
                        <div class="text-center mt20">
                            <a href="#" class="st-link font-medium open-login" data-toggle="modal">Back to Log In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        (function() {
            function maybePrefixUrlField() {
                const value = this.value.trim()
                if (value !== '' && value.indexOf('http') !== 0) {
                    this.value = 'http://' + value
                }
            }

            const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
            for (let j = 0; j < urlFields.length; j++) {
                urlFields[j].addEventListener('blur', maybePrefixUrlField)
            }
        })();
    </script>
    <style>
        .vc_custom_1550627610394 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550627664152 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550627670555 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550627725089 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550627735652 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550628130567 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550628142124 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550628130567 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1550628142124 {
            border-left-width: 2px !important;
            padding-left: 10px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .st_1722046918 {
            height: 80px
        }

        .vc_custom_1680159868644 {
            margin-bottom: 50px !important;
            background-color: #f5f5f5 !important;
        }

        .vc_custom_1542265299369 {
            background-color: #ffffff !important;
        }

        .vc_custom_1543220007372 {
            margin-bottom: 20px !important;
        }

        .vc_custom_1543221092622 {
            border-left-width: 3px !important;
            padding-left: 20px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1543221080532 {
            border-left-width: 3px !important;
            padding-left: 20px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1544512778823 {
            margin-bottom: 15px !important;
            border-left-width: 3px !important;
            padding-left: 20px !important;
            border-left-color: #5191fa !important;
            border-left-style: solid !important;
        }

        .vc_custom_1543220015251 {
            margin-bottom: 20px !important;
        }

        .vc_custom_1543220022219 {
            margin-bottom: 20px !important;
        }

        .vc_custom_1543220028834 {
            margin-bottom: 20px !important;
        }

        .st_1722046919 {
            height: 40px
        }
    </style>
    <script type="text/html" id="wpb-modifications">
        window.wpbCustomElement = 1;
    </script>
    <link rel="stylesheet" id="js_composer_front-css" href="https://mixmap.travelerwp.com/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=7.6" type="text/css" media="all" />
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/dist/vendor/wp-polyfill-inert.min.js?ver=3.1.2" id="wp-polyfill-inert-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.14.0" id="regenerator-runtime-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0" id="wp-polyfill-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/dist/hooks.min.js?ver=2810c76e705dd1a53b18" id="wp-hooks-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/dist/i18n.min.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
    <script type="text/javascript" id="wp-i18n-js-after">
        /* <![CDATA[ */
        wp.i18n.setLocaleData({
            'text direction\u0004ltr': ['ltr']
        });
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.9.8" id="swv-js"></script>
    <script type="text/javascript" id="contact-form-7-js-extra">
        /* <![CDATA[ */
        var wpcf7 = {
            "api": {
                "root": "https:\/\/mixmap.travelerwp.com\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            },
            "cached": "1"
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.9.8" id="contact-form-7-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/mapbox-custom.js" id="mapbox-custom-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/bootstrap.min.js" id="bootstrap-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/jquery.matchHeight.js" id="match-height-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/fotorama/fotorama.js" id="fotorama-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/ion.rangeSlider/js/ion-rangeSlider/ion.rangeSlider.js" id="ion-rangeslider-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/moment.min.js" id="moment-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/daterangepicker/daterangepicker.js" id="daterangepicker-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/jquery.nicescroll.min.js" id="nicescroll-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/sweetalert2.min.js" id="sweetalert2.min-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/markerclusterer.js" id="markerclusterer-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/select2.full.min.js" id="select2.full.min-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/mapbox/custom.js" id="custom-mapboxjs-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/send-message-owner.js" id="send-message-owner-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/flickity.pkgd.min.js" id="flickity.pkgd.min-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/owlcarousel/owl.carousel.min.js" id="owlcarousel-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/jquery.mb.YTPlayer.min.js" id="mb-YTPlayer-js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.1.3/jquery.mCustomScrollbar.concat.min.js" id="mCustomScrollbar-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/car-tranfer.js" id="car-tranfer-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/custom.js" id="custom-js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/themes/traveler/v2/js/sin-tour.js" id="sin-tour-js-js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LdQ4fsUAAAAAOi1Y9yU4py-jx36gCN703stk9y1&amp;ver=3.0" id="google-recaptcha-js"></script>
    <script type="text/javascript" id="wpcf7-recaptcha-js-extra">
        /* <![CDATA[ */
        var wpcf7_recaptcha = {
            "sitekey": "6LdQ4fsUAAAAAOi1Y9yU4py-jx36gCN703stk9y1",
            "actions": {
                "homepage": "homepage",
                "contactform": "contactform"
            }
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/plugins/contact-form-7/modules/recaptcha/index.js?ver=5.9.8" id="wpcf7-recaptcha-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=7.6" id="wpb_composer_front_js-js"></script>
    <script type="text/javascript" src="https://mixmap.travelerwp.com/wp-includes/js/comment-reply.min.js?ver=6.5.5" id="comment-reply-js" async="async" data-wp-strategy="async"></script>
    <script type="text/javascript" defer src="https://mixmap.travelerwp.com/wp-content/plugins/mailchimp-for-wp/assets/js/forms.js?ver=4.9.14" id="mc4wp-forms-api-js"></script>
    <script></script>
</body>

</html>