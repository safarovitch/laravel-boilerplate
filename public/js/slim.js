/*
 * Slim v4.19.0 - Image Cropping Made Easy
 * Copyright (c) 2018 Rik Schennink - http://slimimagecropper.com
 */
! function(t, e) {
    function i() { t.Slim.parse(document) }
    if (t)
        if (t.Slim = function() {
                function t(t, e) { if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function") }

                function i(t, e, i, n) {
                    if (!(e >= 1)) {
                        for (var o = t.width, a = t.height, r = Math.max(n.width, Math.min(i.width, Math.round(t.width * e))), s = Math.max(n.height, Math.min(i.height, Math.round(t.height * e))), h = st(t), u = void 0, l = void 0; o > r && a > s;) u = document.createElement("canvas"), o = Math.round(.5 * h.width), a = Math.round(.5 * h.height), o < r && (o = r), a < s && (a = s), u.width = o, u.height = a, l = u.getContext("2d"), l.drawImage(h, 0, 0, o, a), h = st(u);
                        t.width = r, t.height = s, l = t.getContext("2d"), l.drawImage(h, 0, 0, r, s)
                    }
                }! function() {
                    function t(t, i) { i = i || { bubbles: !1, cancelable: !1, detail: e }; var n = document.createEvent("CustomEvent"); return n.initCustomEvent(t, i.bubbles, i.cancelable, i.detail), n }
                    return "function" != typeof window.CustomEvent && (t.prototype = window.Event.prototype, void(window.CustomEvent = t))
                }();
                var n = function(t, e, i) {
                        var o, a, r = document.createElement("img");
                        if (r.onerror = e, r.onload = function() {!a || i && i.noRevoke || n.revokeObjectURL(a), e && e(n.scale(r, i)) }, n.isInstanceOf("Blob", t) || n.isInstanceOf("File", t)) o = a = n.createObjectURL(t), r._type = t.type;
                        else {
                            if ("string" != typeof t) return !1;
                            o = t, i && i.crossOrigin && (r.crossOrigin = i.crossOrigin)
                        }
                        return o ? (r.src = o, r) : n.readFile(t, function(t) {
                            var i = t.target;
                            i && i.result ? r.src = i.result : e && e(t)
                        })
                    },
                    o = window.createObjectURL && window || window.URL && URL.revokeObjectURL && URL || window.webkitURL && webkitURL;
                n.isInstanceOf = function(t, e) { return Object.prototype.toString.call(e) === "[object " + t + "]" }, n.transformCoordinates = function() {}, n.getTransformedOptions = function(t, e) {
                    var i, n, o, a, r = e.aspectRatio;
                    if (!r) return e;
                    i = {};
                    for (n in e) e.hasOwnProperty(n) && (i[n] = e[n]);
                    return i.crop = !0, o = t.naturalWidth || t.width, a = t.naturalHeight || t.height, o / a > r ? (i.maxWidth = a * r, i.maxHeight = a) : (i.maxWidth = o, i.maxHeight = o / r), i
                }, n.renderImageToCanvas = function(t, e, i, n, o, a, r, s, h, u) { return t.getContext("2d").drawImage(e, i, n, o, a, r, s, h, u), t }, n.hasCanvasOption = function(t) { return t.canvas || t.crop || !!t.aspectRatio }, n.scale = function(t, i) {
                    function o() {
                        var t = Math.max((h || b) / b, (u || k) / k);
                        t > 1 && (b *= t, k *= t)
                    }

                    function a() {
                        var t = Math.min((r || b) / b, (s || k) / k);
                        t < 1 && (b *= t, k *= t)
                    }
                    i = i || {};
                    var r, s, h, u, l, p, c, d, f, _, m, g = document.createElement("canvas"),
                        v = t.getContext || n.hasCanvasOption(i) && g.getContext,
                        y = t.naturalWidth || t.width,
                        w = t.naturalHeight || t.height,
                        b = y,
                        k = w;
                    if (v && (i = n.getTransformedOptions(t, i), c = i.left || 0, d = i.top || 0, i.sourceWidth ? (l = i.sourceWidth, i.right !== e && i.left === e && (c = y - l - i.right)) : l = y - c - (i.right || 0), i.sourceHeight ? (p = i.sourceHeight, i.bottom !== e && i.top === e && (d = w - p - i.bottom)) : p = w - d - (i.bottom || 0), b = l, k = p), r = i.maxWidth, s = i.maxHeight, h = i.minWidth, u = i.minHeight, v && r && s && i.crop ? (b = r, k = s, m = l / p - r / s, m < 0 ? (p = s * l / r, i.top === e && i.bottom === e && (d = (w - p) / 2)) : m > 0 && (l = r * p / s, i.left === e && i.right === e && (c = (y - l) / 2))) : ((i.contain || i.cover) && (h = r = r || h, u = s = s || u), i.cover ? (a(), o()) : (o(), a())), v) {
                        if (f = i.pixelRatio, f > 1 && (g.style.width = b + "px", g.style.height = k + "px", b *= f, k *= f, g.getContext("2d").scale(f, f)), _ = i.downsamplingRatio, _ > 0 && _ < 1 && b < l && k < p)
                            for (; l * _ > b;) g.width = l * _, g.height = p * _, n.renderImageToCanvas(g, t, c, d, l, p, 0, 0, g.width, g.height), l = g.width, p = g.height, t = document.createElement("canvas"), t.width = l, t.height = p, n.renderImageToCanvas(t, g, 0, 0, l, p, 0, 0, l, p);
                        return g.width = b, g.height = k, n.transformCoordinates(g, i), n.renderImageToCanvas(g, t, c, d, l, p, 0, 0, b, k)
                    }
                    return t.width = b, t.height = k, t
                }, n.createObjectURL = function(t) { return !!o && o.createObjectURL(t) }, n.revokeObjectURL = function(t) { return !!o && o.revokeObjectURL(t) }, n.readFile = function(t, e, i) { if (window.FileReader) { var n = new FileReader; if (n.onload = n.onerror = e, i = i || "readAsDataURL", n[i]) return n[i](t), n } return !1 };
                var a = n.hasCanvasOption,
                    r = n.transformCoordinates,
                    s = n.getTransformedOptions;
                n.hasCanvasOption = function(t) { return !!t.orientation || a.call(n, t) }, n.transformCoordinates = function(t, e) {
                    r.call(n, t, e);
                    var i = t.getContext("2d"),
                        o = t.width,
                        a = t.height,
                        s = t.style.width,
                        h = t.style.height,
                        u = e.orientation;
                    if (u && !(u > 8)) switch (u > 4 && (t.width = a, t.height = o, t.style.width = h, t.style.height = s), u) {
                        case 2:
                            i.translate(o, 0), i.scale(-1, 1);
                            break;
                        case 3:
                            i.translate(o, a), i.rotate(Math.PI);
                            break;
                        case 4:
                            i.translate(0, a), i.scale(1, -1);
                            break;
                        case 5:
                            i.rotate(.5 * Math.PI), i.scale(1, -1);
                            break;
                        case 6:
                            i.rotate(.5 * Math.PI), i.translate(0, -a);
                            break;
                        case 7:
                            i.rotate(.5 * Math.PI), i.translate(o, -a), i.scale(-1, 1);
                            break;
                        case 8:
                            i.rotate(-.5 * Math.PI), i.translate(-o, 0)
                    }
                }, n.getTransformedOptions = function(t, e) {
                    var i, o, a = s.call(n, t, e),
                        r = a.orientation;
                    if (!r || r > 8 || 1 === r) return a;
                    i = {};
                    for (o in a) a.hasOwnProperty(o) && (i[o] = a[o]);
                    switch (a.orientation) {
                        case 2:
                            i.left = a.right, i.right = a.left;
                            break;
                        case 3:
                            i.left = a.right, i.top = a.bottom, i.right = a.left, i.bottom = a.top;
                            break;
                        case 4:
                            i.top = a.bottom, i.bottom = a.top;
                            break;
                        case 5:
                            i.left = a.top, i.top = a.left, i.right = a.bottom, i.bottom = a.right;
                            break;
                        case 6:
                            i.left = a.top, i.top = a.right, i.right = a.bottom, i.bottom = a.left;
                            break;
                        case 7:
                            i.left = a.bottom, i.top = a.right, i.right = a.top, i.bottom = a.left;
                            break;
                        case 8:
                            i.left = a.bottom, i.top = a.left, i.right = a.top, i.bottom = a.right
                    }
                    return a.orientation > 4 && (i.maxWidth = a.maxHeight, i.maxHeight = a.maxWidth, i.minWidth = a.minHeight, i.minHeight = a.minWidth, i.sourceWidth = a.sourceHeight, i.sourceHeight = a.sourceWidth), i
                };
                var h = window.Blob && (Blob.prototype.slice || Blob.prototype.webkitSlice || Blob.prototype.mozSlice);
                n.blobSlice = h && function() { var t = this.slice || this.webkitSlice || this.mozSlice; return t.apply(this, arguments) }, n.metaDataParsers = { jpeg: { 65505: [] } }, n.parseMetaData = function(t, e, i) {
                    i = i || {};
                    var o = this,
                        a = i.maxMetaDataSize || 262144,
                        r = {},
                        s = !(window.DataView && t && t.size >= 12 && "image/jpeg" === t.type && n.blobSlice);
                    !s && n.readFile(n.blobSlice.call(t, 0, a), function(t) {
                        if (t.target.error) return void e(r);
                        var a, s, h, u, l = t.target.result,
                            p = new DataView(l),
                            c = 2,
                            d = p.byteLength - 4,
                            f = c;
                        if (65496 === p.getUint16(0)) {
                            for (; c < d && (a = p.getUint16(c), a >= 65504 && a <= 65519 || 65534 === a) && (s = p.getUint16(c + 2) + 2, !(c + s > p.byteLength));) {
                                if (h = n.metaDataParsers.jpeg[a])
                                    for (u = 0; u < h.length; u += 1) h[u].call(o, p, c, s, r, i);
                                c += s, f = c
                            }!i.disableImageHead && f > 6 && (l.slice ? r.imageHead = l.slice(0, f) : r.imageHead = new Uint8Array(l).subarray(0, f))
                        }
                        e(r)
                    }, "readAsArrayBuffer") || e(r)
                }, n.ExifMap = function() { return this }, n.ExifMap.prototype.map = { Orientation: 274 }, n.ExifMap.prototype.get = function(t) { return this[t] || this[this.map[t]] }, n.getExifThumbnail = function(t, e, i) { var n, o, a; if (i && !(e + i > t.byteLength)) { for (n = [], o = 0; o < i; o += 1) a = t.getUint8(e + o), n.push((a < 16 ? "0" : "") + a.toString(16)); return "data:image/jpeg,%" + n.join("%") } }, n.exifTagTypes = { 1: { getValue: function(t, e) { return t.getUint8(e) }, size: 1 }, 2: { getValue: function(t, e) { return String.fromCharCode(t.getUint8(e)) }, size: 1, ascii: !0 }, 3: { getValue: function(t, e, i) { return t.getUint16(e, i) }, size: 2 }, 4: { getValue: function(t, e, i) { return t.getUint32(e, i) }, size: 4 }, 5: { getValue: function(t, e, i) { return t.getUint32(e, i) / t.getUint32(e + 4, i) }, size: 8 }, 9: { getValue: function(t, e, i) { return t.getInt32(e, i) }, size: 4 }, 10: { getValue: function(t, e, i) { return t.getInt32(e, i) / t.getInt32(e + 4, i) }, size: 8 } }, n.exifTagTypes[7] = n.exifTagTypes[1], n.getExifValue = function(t, e, i, o, a, r) { var s, h, u, l, p, c, d = n.exifTagTypes[o]; if (d && (s = d.size * a, h = s > 4 ? e + t.getUint32(i + 8, r) : i + 8, !(h + s > t.byteLength))) { if (1 === a) return d.getValue(t, h, r); for (u = [], l = 0; l < a; l += 1) u[l] = d.getValue(t, h + l * d.size, r); if (d.ascii) { for (p = "", l = 0; l < u.length && (c = u[l], "\0" !== c); l += 1) p += c; return p } return u } }, n.parseExifTag = function(t, e, i, o, a) {
                    var r = t.getUint16(i, o);
                    a.exif[r] = n.getExifValue(t, e, i, t.getUint16(i + 2, o), t.getUint32(i + 4, o), o)
                }, n.parseExifTags = function(t, e, i, n, o) { var a, r, s; if (!(i + 6 > t.byteLength || (a = t.getUint16(i, n), r = i + 2 + 12 * a, r + 4 > t.byteLength))) { for (s = 0; s < a; s += 1) this.parseExifTag(t, e, i + 2 + 12 * s, n, o); return t.getUint32(r, n) } }, n.parseExifData = function(t, e, i, o, a) {
                    if (!a.disableExif) {
                        var r, s, h, u = e + 10;
                        if (1165519206 === t.getUint32(e + 4) && !(u + 8 > t.byteLength) && 0 === t.getUint16(e + 8)) {
                            switch (t.getUint16(u)) {
                                case 18761:
                                    r = !0;
                                    break;
                                case 19789:
                                    r = !1;
                                    break;
                                default:
                                    return
                            }
                            42 === t.getUint16(u + 2, r) && (s = t.getUint32(u + 4, r), o.exif = new n.ExifMap, s = n.parseExifTags(t, u, u + s, r, o), s && !a.disableExifThumbnail && (h = { exif: {} }, s = n.parseExifTags(t, u, u + s, r, h), h.exif[513] && (o.exif.Thumbnail = n.getExifThumbnail(t, u + h.exif[513], h.exif[514]))), o.exif[34665] && !a.disableExifSub && n.parseExifTags(t, u, u + o.exif[34665], r, o), o.exif[34853] && !a.disableExifGps && n.parseExifTags(t, u, u + o.exif[34853], r, o))
                        }
                    }
                }, n.metaDataParsers.jpeg[65505].push(n.parseExifData);
                var u = function() {
                        var t = [],
                            i = [],
                            n = [],
                            o = "transform",
                            a = window.getComputedStyle(document.documentElement, ""),
                            r = (Array.prototype.slice.call(a).join("").match(/-(moz|webkit|ms)-/) || "" === a.OLink && ["", "o"])[1];
                        "webkit" === r && (o = "webkitTransform");
                        var s = function(t, i, n) { var o = t; if (o.length !== e) { for (var a = { chainers: [], then: function(t) { return this.snabbt(t) }, snabbt: function(t) { var e = this.chainers.length; return this.chainers.forEach(function(i, n) { i.snabbt(h(t, n, e)) }), a }, setValue: function(t) { return this.chainers.forEach(function(e) { e.setValue(t) }), a }, finish: function() { return this.chainers.forEach(function(t) { t.finish() }), a }, rollback: function() { return this.chainers.forEach(function(t) { t.rollback() }), a } }, r = 0, s = o.length; r < s; ++r) "string" == typeof i ? a.chainers.push(u(o[r], i, h(n, r, s))) : a.chainers.push(u(o[r], h(i, r, s), n)); return a } return "string" == typeof i ? u(o, i, h(n, 0, 1)) : u(o, h(i, 0, 1), n) },
                            h = function(t, e, i) {
                                if (!t) return t;
                                var n = $(t);
                                J(t.delay) && (n.delay = t.delay(e, i)), J(t.callback) && (n.complete = function() { t.callback.call(this, e, i) });
                                var o = J(t.allDone),
                                    a = J(t.complete);
                                (a || o) && (n.complete = function() { a && t.complete.call(this, e, i), o && e == i - 1 && t.allDone() }), J(t.valueFeeder) && (n.valueFeeder = function(n, o) { return t.valueFeeder(n, o, e, i) }), J(t.easing) && (n.easing = function(n) { return t.easing(n, e, i) });
                                var r = ["position", "rotation", "skew", "rotationPost", "scale", "width", "height", "opacity", "fromPosition", "fromRotation", "fromSkew", "fromRotationPost", "fromScale", "fromWidth", "fromHeight", "fromOpacity", "transformOrigin", "duration", "delay"];
                                return r.forEach(function(o) { J(t[o]) && (n[o] = t[o](e, i)) }), n
                            },
                            u = function(t, e, n) {
                                function o(e) { if (f.tick(e), f.updateElement(t), !f.isStopped()) return f.completed() ? void(a.loop > 1 && !f.isStopped() ? (a.loop -= 1, f.restart(), k(o)) : (a.complete && a.complete.call(t), _.length && (a = _.pop(), s = y(a, u, !0), u = y(a, $(u)), a = w(s, u, a), f = S(a), i.push([t, f]), f.tick(e), k(o)))) : k(o) }
                                if ("attention" === e) return l(t, n);
                                if ("stop" === e) return p(t);
                                if ("detach" === e) return d(t);
                                var a = e;
                                m();
                                var r = v(t),
                                    s = r;
                                s = y(a, s, !0);
                                var u = $(r);
                                u = y(a, u);
                                var c = w(s, u, a),
                                    f = S(c);
                                i.push([t, f]), f.updateElement(t, !0);
                                var _ = [],
                                    g = { snabbt: function(t) { return _.unshift(h(t, 0, 1)), g }, then: function(t) { return this.snabbt(t) } };
                                return k(o), a.manual ? f : g
                            },
                            l = function(t, e) {
                                function n(i) { a.tick(i), a.updateElement(t), a.completed() ? (e.callback && e.callback(t), e.loop && e.loop > 1 && (e.loop--, a.restart(), k(n))) : k(n) }
                                var o = y(e, q({}));
                                e.movement = o;
                                var a = E(e);
                                i.push([t, a]), k(n)
                            },
                            p = function(t) {
                                for (var e = 0, n = i.length; e < n; ++e) {
                                    var o = i[e],
                                        a = o[0],
                                        r = o[1];
                                    a === t && r.stop()
                                }
                            },
                            c = function(t, e) {
                                for (var i = 0, n = t.length; i < n; ++i)
                                    if (t[i][0] === e) return i;
                                return -1
                            },
                            d = function(t) {
                                var e, o, a = [],
                                    r = i.concat(n),
                                    s = r.length;
                                for (o = 0; o < s; ++o) e = r[o][0], (t.contains(e) || t === e) && a.push(e);
                                for (s = a.length, o = 0; o < s; ++o) f(a[o])
                            },
                            f = function(t) {
                                p(t);
                                var e = c(i, t);
                                e >= 0 && i.splice(e, 1), e = c(n, t), e >= 0 && n.splice(e, 1)
                            },
                            _ = function(t, e) {
                                for (var i = 0, n = t.length; i < n; ++i) {
                                    var o = t[i],
                                        a = o[0],
                                        r = o[1];
                                    if (a === e) { var s = r.getCurrentState(); return r.stop(), s }
                                }
                            },
                            m = function() { n = n.filter(function(t) { return g(t[0]).body }) },
                            g = function(t) { for (var e = t; e.parentNode;) e = e.parentNode; return e },
                            v = function(t) { var e = _(i, t); return e ? e : _(n, t) },
                            y = function(t, e, i) {
                                e || (e = q({ position: [0, 0, 0], rotation: [0, 0, 0], rotationPost: [0, 0, 0], scale: [1, 1], skew: [0, 0] }));
                                var n = "position",
                                    o = "rotation",
                                    a = "skew",
                                    r = "rotationPost",
                                    s = "scale",
                                    h = "scalePost",
                                    u = "width",
                                    l = "height",
                                    p = "opacity";
                                return i && (n = "fromPosition", o = "fromRotation", a = "fromSkew", r = "fromRotationPost", s = "fromScale", h = "fromScalePost", u = "fromWidth", l = "fromHeight", p = "fromOpacity"), e.position = G(t[n], e.position), e.rotation = G(t[o], e.rotation), e.rotationPost = G(t[r], e.rotationPost), e.skew = G(t[a], e.skew), e.scale = G(t[s], e.scale), e.scalePost = G(t[h], e.scalePost), e.opacity = t[p], e.width = t[u], e.height = t[l], e
                            },
                            w = function(t, e, i) { return i.startState = t, i.endState = e, i },
                            b = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || function(t) { return setTimeout(t, 1e3 / 60) },
                            k = function(e) { 0 === t.length && b(x), t.push(e) },
                            x = function(e) {
                                for (var o = t.length, a = 0; a < o; ++a) t[a](e);
                                t.splice(0, o);
                                var r = i.filter(function(t) { return t[1].completed() });
                                n = n.filter(function(t) {
                                    for (var e = 0, i = r.length; e < i; ++e)
                                        if (t[0] === r[e][0]) return !1;
                                    return !0
                                }), n = n.concat(r), i = i.filter(function(t) { return !t[1].completed() }), 0 !== t.length && b(x)
                            },
                            S = function(t) {
                                var i = t.startState,
                                    n = t.endState,
                                    o = G(t.duration, 500),
                                    a = G(t.delay, 0),
                                    r = t.perspective,
                                    s = L(G(t.easing, "linear"), t),
                                    h = 0 === o ? n.clone() : i.clone();
                                t.transformOrigin;
                                h.transformOrigin = t.transformOrigin;
                                var u, l, p = 0,
                                    c = 0,
                                    d = !1,
                                    f = !1,
                                    _ = t.manual,
                                    m = 0,
                                    g = a / o;
                                return l = t.valueFeeder ? V(t.valueFeeder, i, n, h) : j(i, n, h), {
                                    stop: function() { d = !0 },
                                    isStopped: function() { return d },
                                    finish: function(t) {
                                        _ = !1;
                                        var e = o * m;
                                        p = c - e, u = t, s.resetFrom = m
                                    },
                                    rollback: function(t) {
                                        _ = !1, l.setReverse();
                                        var e = o * (1 - m);
                                        p = c - e, u = t, s.resetFrom = m
                                    },
                                    restart: function() { p = e, s.resetFrom(0) },
                                    tick: function(t) {
                                        if (!d) {
                                            if (_) return c = t, void this.updateCurrentTransform();
                                            if (p || (p = t), t - p > a) {
                                                f = !0, c = t - a;
                                                var e = Math.min(Math.max(0, c - p), o);
                                                s.tick(e / o), this.updateCurrentTransform(), this.completed() && u && u()
                                            }
                                        }
                                    },
                                    getCurrentState: function() { return h },
                                    setValue: function(t) { f = !0, m = Math.min(Math.max(t, 1e-4), 1 + g) },
                                    updateCurrentTransform: function() {
                                        var t = s.getValue();
                                        if (_) {
                                            var e = Math.max(1e-5, m - g);
                                            s.tick(e), t = s.getValue()
                                        }
                                        l.tween(t)
                                    },
                                    completed: function() { return !!d || 0 !== p && s.completed() },
                                    updateElement: function(t, e) {
                                        if (f || e) {
                                            var i = l.asMatrix(),
                                                n = l.getProperties();
                                            X(t, i, r), Y(t, n)
                                        }
                                    }
                                }
                            },
                            E = function(t) {
                                var i = t.movement;
                                t.initialVelocity = .1, t.equilibriumPosition = 0;
                                var n = T(t),
                                    o = !1,
                                    a = i.position,
                                    r = i.rotation,
                                    s = i.rotationPost,
                                    h = i.scale,
                                    u = i.skew,
                                    l = q({ position: a ? [0, 0, 0] : e, rotation: r ? [0, 0, 0] : e, rotationPost: s ? [0, 0, 0] : e, scale: h ? [0, 0] : e, skew: u ? [0, 0] : e });
                                return {
                                    stop: function() { o = !0 },
                                    isStopped: function(t) { return o },
                                    tick: function(t) { o || n.equilibrium || (n.tick(), this.updateMovement()) },
                                    updateMovement: function() {
                                        var t = n.getValue();
                                        a && (l.position[0] = i.position[0] * t, l.position[1] = i.position[1] * t, l.position[2] = i.position[2] * t), r && (l.rotation[0] = i.rotation[0] * t, l.rotation[1] = i.rotation[1] * t, l.rotation[2] = i.rotation[2] * t), s && (l.rotationPost[0] = i.rotationPost[0] * t, l.rotationPost[1] = i.rotationPost[1] * t, l.rotationPost[2] = i.rotationPost[2] * t), h && (l.scale[0] = 1 + i.scale[0] * t, l.scale[1] = 1 + i.scale[1] * t), u && (l.skew[0] = i.skew[0] * t, l.skew[1] = i.skew[1] * t)
                                    },
                                    updateElement: function(t) { X(t, l.asMatrix()), Y(t, l.getProperties()) },
                                    getCurrentState: function() { return l },
                                    completed: function() { return n.equilibrium || o },
                                    restart: function() { n = T(t) }
                                }
                            },
                            C = function(t) { return t },
                            P = function(t) { return (Math.cos(t * Math.PI + Math.PI) + 1) / 2 },
                            M = function(t) { return t * t },
                            R = function(t) { return -Math.pow(t - 1, 2) + 1 },
                            T = function(t) {
                                var e = G(t.startPosition, 0),
                                    i = G(t.equilibriumPosition, 1),
                                    n = G(t.initialVelocity, 0),
                                    o = G(t.springConstant, .8),
                                    a = G(t.springDeceleration, .9),
                                    r = G(t.springMass, 10),
                                    s = !1;
                                return {
                                    tick: function(t) {
                                        if (0 !== t && !s) {
                                            var h = -(e - i) * o,
                                                u = h / r;
                                            n += u, e += n, n *= a, Math.abs(e - i) < .001 && Math.abs(n) < .001 && (s = !0)
                                        }
                                    },
                                    resetFrom: function(t) { e = t, n = 0 },
                                    getValue: function() { return s ? i : e },
                                    completed: function() { return s }
                                }
                            },
                            I = { linear: C, ease: P, easeIn: M, easeOut: R },
                            L = function(t, e) {
                                if ("spring" == t) return T(e);
                                var i = t;
                                J(t) || (i = I[t]);
                                var n, o = i,
                                    a = 0;
                                return { tick: function(t) { a = o(t), n = t }, resetFrom: function(t) { n = 0 }, getValue: function() { return a }, completed: function() { return n >= 1 && n } }
                            },
                            O = function(t, e, i, n) { t[0] = 1, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = 1, t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = e, t[13] = i, t[14] = n, t[15] = 1 },
                            z = function(t, e) { t[0] = 1, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = Math.cos(e), t[6] = -Math.sin(e), t[7] = 0, t[8] = 0, t[9] = Math.sin(e), t[10] = Math.cos(e), t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            D = function(t, e) { t[0] = Math.cos(e), t[1] = 0, t[2] = Math.sin(e), t[3] = 0, t[4] = 0, t[5] = 1, t[6] = 0, t[7] = 0, t[8] = -Math.sin(e), t[9] = 0, t[10] = Math.cos(e), t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            A = function(t, e) { t[0] = Math.cos(e), t[1] = -Math.sin(e), t[2] = 0, t[3] = 0, t[4] = Math.sin(e), t[5] = Math.cos(e), t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            U = function(t, e, i) { t[0] = 1, t[1] = Math.tan(e), t[2] = 0, t[3] = 0, t[4] = Math.tan(i), t[5] = 1, t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            H = function(t, e, i) { t[0] = e, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = i, t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            N = function(t) { t[0] = 1, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = 1, t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1 },
                            B = function(t, e) { e[0] = t[0], e[1] = t[1], e[2] = t[2], e[3] = t[3], e[4] = t[4], e[5] = t[5], e[6] = t[6], e[7] = t[7], e[8] = t[8], e[9] = t[9], e[10] = t[10], e[11] = t[11], e[12] = t[12], e[13] = t[13], e[14] = t[14], e[15] = t[15] },
                            F = function() {
                                var t = new Float32Array(16),
                                    e = new Float32Array(16),
                                    i = new Float32Array(16);
                                return N(t), { data: t, asCSS: function() { for (var e = "matrix3d(", i = 0; i < 15; ++i) e += Math.abs(t[i]) < 1e-4 ? "0," : t[i].toFixed(10) + ","; return e += Math.abs(t[15]) < 1e-4 ? "0)" : t[15].toFixed(10) + ")" }, clear: function() { N(t) }, translate: function(n, o, a) { return B(t, e), O(i, n, o, a), W(e, i, t), this }, rotateX: function(n) { return B(t, e), z(i, n), W(e, i, t), this }, rotateY: function(n) { return B(t, e), D(i, n), W(e, i, t), this }, rotateZ: function(n) { return B(t, e), A(i, n), W(e, i, t), this }, scale: function(n, o) { return B(t, e), H(i, n, o), W(e, i, t), this }, skew: function(n, o) { return B(t, e), U(i, n, o), W(e, i, t), this } }
                            },
                            W = function(t, e, i) { return i[0] = t[0] * e[0] + t[1] * e[4] + t[2] * e[8] + t[3] * e[12], i[1] = t[0] * e[1] + t[1] * e[5] + t[2] * e[9] + t[3] * e[13], i[2] = t[0] * e[2] + t[1] * e[6] + t[2] * e[10] + t[3] * e[14], i[3] = t[0] * e[3] + t[1] * e[7] + t[2] * e[11] + t[3] * e[15], i[4] = t[4] * e[0] + t[5] * e[4] + t[6] * e[8] + t[7] * e[12], i[5] = t[4] * e[1] + t[5] * e[5] + t[6] * e[9] + t[7] * e[13], i[6] = t[4] * e[2] + t[5] * e[6] + t[6] * e[10] + t[7] * e[14], i[7] = t[4] * e[3] + t[5] * e[7] + t[6] * e[11] + t[7] * e[15], i[8] = t[8] * e[0] + t[9] * e[4] + t[10] * e[8] + t[11] * e[12], i[9] = t[8] * e[1] + t[9] * e[5] + t[10] * e[9] + t[11] * e[13], i[10] = t[8] * e[2] + t[9] * e[6] + t[10] * e[10] + t[11] * e[14], i[11] = t[8] * e[3] + t[9] * e[7] + t[10] * e[11] + t[11] * e[15], i[12] = t[12] * e[0] + t[13] * e[4] + t[14] * e[8] + t[15] * e[12], i[13] = t[12] * e[1] + t[13] * e[5] + t[14] * e[9] + t[15] * e[13], i[14] = t[12] * e[2] + t[13] * e[6] + t[14] * e[10] + t[15] * e[14], i[15] = t[12] * e[3] + t[13] * e[7] + t[14] * e[11] + t[15] * e[15], i },
                            q = function(t) {
                                var i = F(),
                                    n = { opacity: e, width: e, height: e };
                                return { position: t.position, rotation: t.rotation, rotationPost: t.rotationPost, skew: t.skew, scale: t.scale, scalePost: t.scalePost, opacity: t.opacity, width: t.width, height: t.height, clone: function() { return q({ position: this.position ? this.position.slice(0) : e, rotation: this.rotation ? this.rotation.slice(0) : e, rotationPost: this.rotationPost ? this.rotationPost.slice(0) : e, skew: this.skew ? this.skew.slice(0) : e, scale: this.scale ? this.scale.slice(0) : e, scalePost: this.scalePost ? this.scalePost.slice(0) : e, height: this.height, width: this.width, opacity: this.opacity }) }, asMatrix: function() { var t = i; return t.clear(), this.transformOrigin && t.translate(-this.transformOrigin[0], -this.transformOrigin[1], -this.transformOrigin[2]), this.scale && t.scale(this.scale[0], this.scale[1]), this.skew && t.skew(this.skew[0], this.skew[1]), this.rotation && (t.rotateX(this.rotation[0]), t.rotateY(this.rotation[1]), t.rotateZ(this.rotation[2])), this.position && t.translate(this.position[0], this.position[1], this.position[2]), this.rotationPost && (t.rotateX(this.rotationPost[0]), t.rotateY(this.rotationPost[1]), t.rotateZ(this.rotationPost[2])), this.scalePost && t.scale(this.scalePost[0], this.scalePost[1]), this.transformOrigin && t.translate(this.transformOrigin[0], this.transformOrigin[1], this.transformOrigin[2]), t }, getProperties: function() { return n.opacity = this.opacity, n.width = this.width + "px", n.height = this.height + "px", n } }
                            },
                            j = function(t, i, n) {
                                var o = t,
                                    a = i,
                                    r = n,
                                    s = a.position !== e,
                                    h = a.rotation !== e,
                                    u = a.rotationPost !== e,
                                    l = a.scale !== e,
                                    p = a.skew !== e,
                                    c = a.width !== e,
                                    d = a.height !== e,
                                    f = a.opacity !== e;
                                return {
                                    tween: function(t) {
                                        if (s) {
                                            var e = a.position[0] - o.position[0],
                                                i = a.position[1] - o.position[1],
                                                n = a.position[2] - o.position[2];
                                            r.position[0] = o.position[0] + t * e, r.position[1] = o.position[1] + t * i, r.position[2] = o.position[2] + t * n
                                        }
                                        if (h) {
                                            var _ = a.rotation[0] - o.rotation[0],
                                                m = a.rotation[1] - o.rotation[1],
                                                g = a.rotation[2] - o.rotation[2];
                                            r.rotation[0] = o.rotation[0] + t * _, r.rotation[1] = o.rotation[1] + t * m, r.rotation[2] = o.rotation[2] + t * g
                                        }
                                        if (u) {
                                            var v = a.rotationPost[0] - o.rotationPost[0],
                                                y = a.rotationPost[1] - o.rotationPost[1],
                                                w = a.rotationPost[2] - o.rotationPost[2];
                                            r.rotationPost[0] = o.rotationPost[0] + t * v, r.rotationPost[1] = o.rotationPost[1] + t * y, r.rotationPost[2] = o.rotationPost[2] + t * w
                                        }
                                        if (p) {
                                            var b = a.scale[0] - o.scale[0],
                                                k = a.scale[1] - o.scale[1];
                                            r.scale[0] = o.scale[0] + t * b, r.scale[1] = o.scale[1] + t * k
                                        }
                                        if (l) {
                                            var x = a.skew[0] - o.skew[0],
                                                S = a.skew[1] - o.skew[1];
                                            r.skew[0] = o.skew[0] + t * x, r.skew[1] = o.skew[1] + t * S
                                        }
                                        if (c) {
                                            var E = a.width - o.width;
                                            r.width = o.width + t * E
                                        }
                                        if (d) {
                                            var C = a.height - o.height;
                                            r.height = o.height + t * C
                                        }
                                        if (f) {
                                            var P = a.opacity - o.opacity;
                                            r.opacity = o.opacity + t * P
                                        }
                                    },
                                    asMatrix: function() { return r.asMatrix() },
                                    getProperties: function() { return r.getProperties() },
                                    setReverse: function() {
                                        var t = o;
                                        o = a, a = t
                                    }
                                }
                            },
                            V = function(t, i, n, o) {
                                var a = t(0, F()),
                                    r = i,
                                    s = n,
                                    h = o,
                                    u = !1;
                                return {
                                    tween: function(i) {
                                        u && (i = 1 - i), a.clear(), a = t(i, a);
                                        var n = s.width - r.width,
                                            o = s.height - r.height,
                                            l = s.opacity - r.opacity;
                                        s.width !== e && (h.width = r.width + i * n), s.height !== e && (h.height = r.height + i * o), s.opacity !== e && (h.opacity = r.opacity + i * l)
                                    },
                                    asMatrix: function() { return a },
                                    getProperties: function() { return h.getProperties() },
                                    setReverse: function() { u = !0 }
                                }
                            },
                            G = function(t, e) { return "undefined" == typeof t ? e : t },
                            X = function(t, e, i) {
                                var n = "";
                                i && (n = "perspective(" + i + "px) ");
                                var a = e.asCSS();
                                t.style[o] = n + a
                            },
                            Y = function(t, e) { for (var i in e) t.style[i] = e[i] },
                            J = function(t) { return "function" == typeof t },
                            $ = function(t) { if (!t) return t; var e = {}; for (var i in t) e[i] = t[i]; return e };
                        return s.createMatrix = F, s.setElementTransform = X, s
                    }(),
                    l = function() {
                        function t(t, e, i, n, o) {
                            if ("string" == typeof t) t = document.getElementById(t);
                            else if (!t instanceof HTMLCanvasElement) return;
                            var a, r = t.getContext("2d");
                            try { try { a = r.getImageData(e, i, n, o) } catch (s) { throw new Error("unable to access local image data: " + s) } } catch (s) { throw new Error("unable to access image data: " + s) }
                            return a
                        }

                        function e(e, n, o, a, r, s) {
                            if (!(isNaN(s) || s < 1)) {
                                s |= 0;
                                var h = t(e, n, o, a, r);
                                h = i(h, n, o, a, r, s), e.getContext("2d").putImageData(h, n, o)
                            }
                        }

                        function i(t, e, i, r, s, h) {
                            var u, l, p, c, d, f, _, m, g, v, y, w, b, k, x, S, E, C, P, M, R, T, I, L, O = t.data,
                                z = h + h + 1,
                                D = r - 1,
                                A = s - 1,
                                U = h + 1,
                                H = U * (U + 1) / 2,
                                N = new n,
                                B = N;
                            for (p = 1; p < z; p++)
                                if (B = B.next = new n, p == U) var F = B;
                            B.next = N;
                            var W = null,
                                q = null;
                            _ = f = 0;
                            var j = o[h],
                                V = a[h];
                            for (l = 0; l < s; l++) {
                                for (S = E = C = P = m = g = v = y = 0, w = U * (M = O[f]), b = U * (R = O[f + 1]), k = U * (T = O[f + 2]), x = U * (I = O[f + 3]), m += H * M, g += H * R, v += H * T, y += H * I, B = N, p = 0; p < U; p++) B.r = M, B.g = R, B.b = T, B.a = I, B = B.next;
                                for (p = 1; p < U; p++) c = f + ((D < p ? D : p) << 2), m += (B.r = M = O[c]) * (L = U - p), g += (B.g = R = O[c + 1]) * L, v += (B.b = T = O[c + 2]) * L, y += (B.a = I = O[c + 3]) * L, S += M, E += R, C += T, P += I, B = B.next;
                                for (W = N, q = F, u = 0; u < r; u++) O[f + 3] = I = y * j >> V, 0 != I ? (I = 255 / I, O[f] = (m * j >> V) * I, O[f + 1] = (g * j >> V) * I, O[f + 2] = (v * j >> V) * I) : O[f] = O[f + 1] = O[f + 2] = 0, m -= w, g -= b, v -= k, y -= x, w -= W.r, b -= W.g, k -= W.b, x -= W.a, c = _ + ((c = u + h + 1) < D ? c : D) << 2, S += W.r = O[c], E += W.g = O[c + 1], C += W.b = O[c + 2], P += W.a = O[c + 3], m += S, g += E, v += C, y += P, W = W.next, w += M = q.r, b += R = q.g, k += T = q.b, x += I = q.a, S -= M, E -= R, C -= T, P -= I, q = q.next, f += 4;
                                _ += r
                            }
                            for (u = 0; u < r; u++) { for (E = C = P = S = g = v = y = m = 0, f = u << 2, w = U * (M = O[f]), b = U * (R = O[f + 1]), k = U * (T = O[f + 2]), x = U * (I = O[f + 3]), m += H * M, g += H * R, v += H * T, y += H * I, B = N, p = 0; p < U; p++) B.r = M, B.g = R, B.b = T, B.a = I, B = B.next; for (d = r, p = 1; p <= h; p++) f = d + u << 2, m += (B.r = M = O[f]) * (L = U - p), g += (B.g = R = O[f + 1]) * L, v += (B.b = T = O[f + 2]) * L, y += (B.a = I = O[f + 3]) * L, S += M, E += R, C += T, P += I, B = B.next, p < A && (d += r); for (f = u, W = N, q = F, l = 0; l < s; l++) c = f << 2, O[c + 3] = I = y * j >> V, I > 0 ? (I = 255 / I, O[c] = (m * j >> V) * I, O[c + 1] = (g * j >> V) * I, O[c + 2] = (v * j >> V) * I) : O[c] = O[c + 1] = O[c + 2] = 0, m -= w, g -= b, v -= k, y -= x, w -= W.r, b -= W.g, k -= W.b, x -= W.a, c = u + ((c = l + U) < A ? c : A) * r << 2, m += S += W.r = O[c], g += E += W.g = O[c + 1], v += C += W.b = O[c + 2], y += P += W.a = O[c + 3], W = W.next, w += M = q.r, b += R = q.g, k += T = q.b, x += I = q.a, S -= M, E -= R, C -= T, P -= I, q = q.next, f += r }
                            return t
                        }

                        function n() { this.r = 0, this.g = 0, this.b = 0, this.a = 0, this.next = null }
                        var o = [512, 512, 456, 512, 328, 456, 335, 512, 405, 328, 271, 456, 388, 335, 292, 512, 454, 405, 364, 328, 298, 271, 496, 456, 420, 388, 360, 335, 312, 292, 273, 512, 482, 454, 428, 405, 383, 364, 345, 328, 312, 298, 284, 271, 259, 496, 475, 456, 437, 420, 404, 388, 374, 360, 347, 335, 323, 312, 302, 292, 282, 273, 265, 512, 497, 482, 468, 454, 441, 428, 417, 405, 394, 383, 373, 364, 354, 345, 337, 328, 320, 312, 305, 298, 291, 284, 278, 271, 265, 259, 507, 496, 485, 475, 465, 456, 446, 437, 428, 420, 412, 404, 396, 388, 381, 374, 367, 360, 354, 347, 341, 335, 329, 323, 318, 312, 307, 302, 297, 292, 287, 282, 278, 273, 269, 265, 261, 512, 505, 497, 489, 482, 475, 468, 461, 454, 447, 441, 435, 428, 422, 417, 411, 405, 399, 394, 389, 383, 378, 373, 368, 364, 359, 354, 350, 345, 341, 337, 332, 328, 324, 320, 316, 312, 309, 305, 301, 298, 294, 291, 287, 284, 281, 278, 274, 271, 268, 265, 262, 259, 257, 507, 501, 496, 491, 485, 480, 475, 470, 465, 460, 456, 451, 446, 442, 437, 433, 428, 424, 420, 416, 412, 408, 404, 400, 396, 392, 388, 385, 381, 377, 374, 370, 367, 363, 360, 357, 354, 350, 347, 344, 341, 338, 335, 332, 329, 326, 323, 320, 318, 315, 312, 310, 307, 304, 302, 299, 297, 294, 292, 289, 287, 285, 282, 280, 278, 275, 273, 271, 269, 267, 265, 263, 261, 259],
                            a = [9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24];
                        return e
                    }();
                HTMLCanvasElement.prototype.toBlob || Object.defineProperty(HTMLCanvasElement.prototype, "toBlob", {
                    value: function(t, e, i) {
                        for (var n = atob(this.toDataURL(e, i).split(",")[1]), o = n.length, a = new Uint8Array(o), r = 0; r < o; r++) a[r] = n.charCodeAt(r);
                        t(new Blob([a], { type: e || "image/png" }))
                    }
                });
                var p = function() {
                        function t(t, e) {
                            for (var i = 0; i < e.length; i++) {
                                var n = e[i];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                            }
                        }
                        return function(e, i, n) { return i && t(e.prototype, i), n && t(e, n), e }
                    }(),
                    c = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) { return typeof t } : function(t) { return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t },
                    d = function(t) {
                        if ("undefined" == typeof t.dataset) {
                            var e, i, n = {},
                                o = t.attributes;
                            for (e in o) o.hasOwnProperty(e) && o[e].name && /^data-[a-z_\-\d]*$/i.test(o[e].name) && (i = f(o[e].name.substr(5)), n[i] = o[e].value);
                            return n
                        }
                        return t.dataset
                    },
                    f = function(t) { return t.replace(/\-./g, function(t) { return t.charAt(1).toUpperCase() }) },
                    _ = function(t) { for (var e = [], i = Array.prototype.slice.call(t.attributes), n = i.length, o = 0; o < n; o++) e.push({ name: i[o].name, value: i[o].value }); return e },
                    m = function(t) { return { x: "undefined" == typeof t.offsetX ? t.layerX : t.offsetX, y: "undefined" == typeof t.offsetY ? t.layerY : t.offsetY } },
                    g = function(t, e) {
                        var i, n = {},
                            o = e || {};
                        for (i in t) t.hasOwnProperty(i) && (n[i] = "undefined" == typeof o[i] ? t[i] : o[i]);
                        return n
                    },
                    v = { ESC: 27, RETURN: 13 },
                    y = { DOWN: ["touchstart", "pointerdown", "mousedown"], MOVE: ["touchmove", "pointermove", "mousemove"], UP: ["touchend", "touchcancel", "pointerup", "mouseup"] },
                    w = { jpeg: "image/jpeg", jpg: "image/jpeg", jpe: "image/jpeg", png: "image/png", gif: "image/gif", bmp: "image/bmp" },
                    b = /(\.png|\.bmp|\.gif|\.jpg|\.jpe|\.jpg|\.jpeg)$/,
                    k = function(t, e) { var i = document.createElement(t); return e && (i.className = e), i },
                    x = function(t, e, i) { e.forEach(function(e) { t.addEventListener(e, i, !1) }) },
                    S = function(t, e, i) { e.forEach(function(e) { t.removeEventListener(e, i, !1) }) },
                    E = function(t) { var e = t.changedTouches ? t.changedTouches[0] : t; if (e) return { x: e.pageX, y: e.pageY } },
                    C = function(t, e) {
                        var i = .5,
                            n = .5,
                            o = Math.PI / 180 * e,
                            a = Math.cos(o),
                            r = Math.sin(o),
                            s = t.x,
                            h = t.y,
                            u = t.x + t.width,
                            l = t.y + t.height,
                            p = a * (s - i) + r * (h - n) + i,
                            c = a * (h - n) - r * (s - i) + n,
                            d = a * (u - i) + r * (l - n) + i,
                            f = a * (l - n) - r * (u - i) + n;
                        p <= d ? (t.x = p, t.width = d - p) : (t.x = d, t.width = p - d), c <= f ? (t.y = c, t.height = f - c) : (t.y = f, t.height = c - f)
                    },
                    P = function(t) { var e = E(t); return e.x -= window.pageXOffset || document.documentElement.scrollLeft, e.y -= window.pageYOffset || document.documentElement.scrollTop, e },
                    M = function(t) { return t.charAt(0).toLowerCase() + t.slice(1) },
                    R = function(t) { return t.charAt(0).toUpperCase() + t.slice(1) },
                    T = function(t) { return t[t.length - 1] },
                    I = function(t, e, i) { return Math.max(e, Math.min(i, t)) },
                    L = function(t, e) {
                        if (!e) return !1;
                        for (var i = 0; i < e.length; i++)
                            if (e[i] === t) return !0;
                        return !1
                    },
                    O = function(t) {
                        var i = arguments.length > 1 && arguments[1] !== e ? arguments[1] : "POST",
                            n = arguments[2],
                            o = arguments[3],
                            a = arguments[4],
                            r = arguments[5],
                            s = arguments[6],
                            h = new XMLHttpRequest;
                        a && h.upload.addEventListener("progress", function(t) { a(t.loaded, t.total) }), h.open(i, t, !0), o && o(h, n), h.onreadystatechange = function() {
                            if (4 === h.readyState && h.status >= 200 && h.status < 300) {
                                var t = h.responseText;
                                if (!t.length) return void r();
                                if (t.indexOf("Content-Length") !== -1) return void s("file-too-big");
                                var e = void 0;
                                try { e = JSON.parse(h.responseText) } catch (i) {}
                                if ("object" === ("undefined" == typeof e ? "undefined" : c(e)) && "failure" === e.status) return void s(e.message);
                                r(e || t)
                            } else if (4 === h.readyState) {
                                var n = void 0;
                                try { n = JSON.parse(h.responseText) } catch (i) {}
                                if ("object" === ("undefined" == typeof n ? "undefined" : c(n)) && "failure" === n.status) return void s(n.message);
                                s("fail")
                            }
                        }, h.send(n)
                    },
                    z = function(t) { t && (t.style.webkitTransform = "", t.style.transform = "") },
                    D = function(t) { return t / 1e6 },
                    A = function() {
                        var t = [],
                            e = void 0,
                            i = void 0;
                        for (e in w) w.hasOwnProperty(e) && (i = w[e], t.indexOf(i) == -1 && t.push(i));
                        return t
                    },
                    U = function(t) { return "image/jpeg" === t },
                    H = function(t) {
                        var e = void 0;
                        for (e in w)
                            if (w.hasOwnProperty(e) && w[e] === t) return e;
                        return t
                    },
                    N = function(t) {
                        var e = void 0;
                        for (e in w)
                            if (w.hasOwnProperty(e) && t.indexOf(w[e]) !== -1) return w[e];
                        return null
                    },
                    B = function(t) { return t.split("/").pop().split("?").shift() },
                    F = function(t) { var i = arguments.length > 1 && arguments[1] !== e ? arguments[1] : ""; return (i + t).slice(-i.length) },
                    W = function(t) { return t.getFullYear() + "-" + F(t.getMonth() + 1, "00") + "-" + F(t.getDate(), "00") + "_" + F(t.getHours(), "00") + "-" + F(t.getMinutes(), "00") + "-" + F(t.getSeconds(), "00") },
                    q = function(t) { return "undefined" == typeof t.name ? W(new Date) + "." + H(j(t)) : t.name },
                    j = function(t) { return t.type || "image/jpeg" },
                    V = function(t) { if ("string" != typeof t) return W(new Date); var e = B(t); return e.split(".").shift() },
                    G = function(t, e) { try { return new File([t], e, { type: t.type, lastModified: Date.now() }) } catch (i) { return t.lastModified = new Date, t.name = e, t } },
                    X = function(t) { return /^data:image/.test(t) },
                    Y = function(t, e, i, n, o, a) {
                        t = "" + t + (t.indexOf("?") !== -1 ? "&" : "?") + "url=" + n;
                        var r = new XMLHttpRequest;
                        r.open("GET", t, !0), e(r), r.responseType = "json", r.onload = function() { return "failure" === this.response.status ? void o(this.response.message) : void J(this.response.body, i, a) }, r.send()
                    },
                    J = function(t, e, i, n) {
                        var o = new XMLHttpRequest;
                        o.open("GET", t, !0), e(o), o.responseType = "blob", o.onload = function(e) {
                            if (o.status >= 200 && o.status < 300) {
                                var a = B(t),
                                    r = N(this.response.type);
                                b.test(a) || (a += "." + H(r));
                                var s = G(this.response, a);
                                i(gt(s, r))
                            } else n(o.status + ": " + o.statusText)
                        }, o.onerror = function() { n() }, o.send()
                    },
                    $ = function(t) {
                        var e = t.split(",")[1],
                            i = e.replace(/\s/g, "");
                        return atob(i)
                    },
                    Z = function(t, e) { for (var i = $(t), n = new ArrayBuffer(i.length), o = new Uint8Array(n), a = 0; a < i.length; a++) o[a] = i.charCodeAt(a); var r = wt(t); return "undefined" == typeof e && (e = W(new Date) + "." + H(r)), G(K(n, r), e) },
                    K = function(t, e) { var i = window.BlobBuilder = window.BlobBuilder || window.WebKitBlobBuilder || window.MozBlobBuilder || window.MSBlobBuilder; if (i) { var n = new i; return n.append(t), n.getBlob(e) } return new Blob([t], { type: e }) },
                    Q = function(t, e, i) {
                        var o = "string" != typeof t || 0 !== t.indexOf("data:image");
                        n.parseMetaData(t, function(a) {
                            var r = { canvas: !0, crossOrigin: o };
                            e && (r.maxWidth = e.width, r.maxHeight = e.height), a.exif && (r.orientation = a.exif.get("Orientation")), n(t, function(t) { return "error" === t.type ? void i() : void i(t, a) }, r)
                        })
                    },
                    tt = function(t, e, i) {
                        var n, o, a, r, s = e / t;
                        return s < i ? (r = e, a = r / i, n = .5 * (t - a), o = 0) : (a = t, r = a * i, n = 0, o = .5 * (e - r)), {
                            x: n,
                            y: o,
                            height: r,
                            width: a
                        }
                    },
                    et = function(t) {
                        var n = arguments.length > 1 && arguments[1] !== e ? arguments[1] : {},
                            o = arguments[2],
                            a = k("canvas"),
                            r = n.rotation,
                            s = n.crop,
                            h = n.size,
                            u = n.filters,
                            l = n.minSize;
                        if (s) {
                            var p = r % 180 !== 0,
                                c = { width: p ? t.height : t.width, height: p ? t.width : t.height };
                            s.x < 0 && (s.x = 0), s.y < 0 && (s.y = 0), s.width > c.width && (s.width = c.width), s.height > c.height && (s.height = c.height), s.y + s.height > c.height && (s.y = Math.max(0, c.height - s.height)), s.x + s.width > c.width && (s.x = Math.max(0, c.width - s.width));
                            var d = s.x / c.width,
                                f = s.y / c.height,
                                _ = s.width / c.width,
                                m = s.height / c.height;
                            a.width = s.width, a.height = s.height;
                            var g = a.getContext("2d");
                            90 === r ? (g.translate(.5 * a.width, .5 * a.height), g.rotate(-90 * Math.PI / 180), g.drawImage(t, (1 - f) * t.width - t.width * m, s.x, s.height, s.width, .5 * -a.height, .5 * -a.width, a.height, a.width)) : 180 === r ? (g.translate(.5 * a.width, .5 * a.height), g.rotate(-180 * Math.PI / 180), g.drawImage(t, (1 - (d + _)) * c.width, (1 - (f + m)) * c.height, _ * c.width, m * c.height, .5 * -a.width, .5 * -a.height, a.width, a.height)) : 270 === r ? (g.translate(.5 * a.width, .5 * a.height), g.rotate(-270 * Math.PI / 180), g.drawImage(t, s.y, (1 - d) * t.height - t.height * _, s.height, s.width, .5 * -a.height, .5 * -a.width, a.height, a.width)) : g.drawImage(t, s.x, s.y, s.width, s.height, 0, 0, a.width, a.height)
                        }
                        if (h) {
                            var v = h.width / a.width,
                                y = h.height / a.height,
                                w = Math.min(v, y);
                            i(a, w, h, l), u.sharpen > 0 && nt(a, at(u.sharpen))
                        }
                        o(a)
                    },
                    it = function(t) { var e = t.getContext("2d"); return e.getImageData(0, 0, t.width, t.height) },
                    nt = function(t, e) {
                        var i = t.getContext("2d");
                        i.putImageData(e(it(t), t.width, t.height), 0, 0)
                    },
                    ot = function(t, e, i) {
                        var n = document.createElement("canvas");
                        n.width = t, n.height = e;
                        var o = n.getContext("2d"),
                            a = o.createImageData(n.width, n.height);
                        return i && a.set(i.data), a
                    },
                    at = function(t) {
                        return function(e, i, n) {
                            for (var o = [0, -1, 0, -1, 5, -1, 0, -1, 0], a = Math.round(Math.sqrt(o.length)), r = .5 * a | 0, s = ot(i, n), h = s.data, u = e.data, l = n, p = void 0; l--;)
                                for (p = i; p--;) {
                                    for (var c = l, d = p, f = 4 * (l * i + p), _ = 0, m = 0, g = 0, v = 0, y = 0; y < a; y++)
                                        for (var w = 0; w < a; w++) {
                                            var b = c + y - r,
                                                k = d + w - r;
                                            if (b >= 0 && b < n && k >= 0 && k < i) {
                                                var x = 4 * (b * i + k),
                                                    S = o[y * a + w];
                                                _ += u[x] * S, m += u[x + 1] * S, g += u[x + 2] * S, v += u[x + 3] * S
                                            }
                                        }
                                    h[f] = _ * t + u[f] * (1 - t), h[f + 1] = m * t + u[f + 1] * (1 - t), h[f + 2] = g * t + u[f + 2] * (1 - t), h[f + 3] = u[f + 3]
                                }
                            return s
                        }
                    },
                    rt = function(t, e) {
                        var i = Math.abs(t.width - e.width),
                            n = Math.abs(t.height - e.height);
                        return Math.max(i, n)
                    },
                    st = function(t) { return ht(t, 1) },
                    ht = function(t, e) {
                        if (!t) return null;
                        var n = document.createElement("canvas"),
                            o = n.getContext("2d");
                        return n.width = t.width, n.height = t.height, o.drawImage(t, 0, 0), e > 0 && 1 !== e && i(n, e, { width: Math.round(t.width * e), height: Math.round(t.height * e) }, { width: 0, height: 0 }), n
                    },
                    ut = function(t) { return t.width && t.height },
                    lt = function(t, e) {
                        var i = e.getContext("2d");
                        ut(e) ? i.drawImage(t, 0, 0, e.width, e.height) : (e.width = t.width, e.height = t.height, i.drawImage(t, 0, 0))
                    },
                    pt = function(t) { l(t, 0, 0, t.width, t.height, 3) },
                    ct = function(t, e) { return parseInt(t.width, 10) >= e.width && parseInt(t.height, 10) >= e.height },
                    dt = function(t, e, i) { return { x: t.x * e, y: t.y * i, width: t.width * e, height: t.height * i } },
                    ft = function(t, e, i) { return { x: t.x / e, y: t.y / i, width: t.width / e, height: t.height / i } },
                    _t = function(t) {
                        if (t && "" !== t.value) {
                            try { t.value = "" } catch (e) {}
                            if (t.value) {
                                var i = document.createElement("form"),
                                    n = t.parentNode,
                                    o = t.nextSibling;
                                i.appendChild(t), i.reset(), o ? n.insertBefore(t, o) : n.appendChild(t)
                            }
                        }
                    },
                    mt = function(t) { return "object" === ("undefined" == typeof value ? "undefined" : c(value)) && null !== value ? JSON.parse(JSON.stringify(t)) : t },
                    gt = function(t) { var i = arguments.length > 1 && arguments[1] !== e ? arguments[1] : null; if (!t) return null; var n = t.slice(0, t.size, i || t.type); return n.name = t.name, n.lastModified = new Date(t.lastModified), n },
                    vt = function(t) { var e = mt(t); return e.input.file = gt(t.input.file), e.output.image = st(t.output.image), e },
                    yt = function(t, i, n) { return t && i ? t.toDataURL(i, U(i) && "number" == typeof n ? n / 100 : e) : null },
                    wt = function(t) { if (!t) return null; var e = t.substr(0, 16).match(/^.+;/); return e.length ? e[0].substring(5, e[0].length - 1) : null },
                    bt = function(t) {
                        var i = arguments.length > 1 && arguments[1] !== e ? arguments[1] : [],
                            n = arguments[2],
                            o = arguments[3],
                            a = arguments[4],
                            r = { server: mt(t.server), meta: mt(t.meta), input: { name: t.input.name, type: t.input.type, size: t.input.size, width: t.input.width, height: t.input.height, field: t.input.field } };
                        return L("input", i) && !a && (r.input.image = yt(t.input.image, t.input.type)), L("output", i) && (r.output = { name: o ? V(t.input.name) + "." + o : t.input.name, type: w[o] || t.input.type, width: t.output.width, height: t.output.height }, r.output.image = yt(t.output.image, r.output.type, n), r.output.type = wt(r.output.image), "image/png" === r.output.type && (r.output.name = V(r.input.name) + ".png")), L("actions", i) && (r.actions = mt(t.actions)), r
                    },
                    kt = function(t, i, n) {
                        var o = t.output.image,
                            a = n ? V(t.input.name) + "." + n : t.input.name,
                            r = w[n] || t.input.type;
                        "image/png" === r && (a = V(t.input.name) + ".png"), o.toBlob(function(t) {
                            if ("msSaveBlob" in window.navigator) return void window.navigator.msSaveBlob(t, a);
                            var e = (window.URL || window.webkitURL).createObjectURL(t),
                                i = k("a");
                            i.style.display = "none", i.download = a, i.href = e, document.body.appendChild(i), i.click(), setTimeout(function() { document.body.removeChild(i), (window.URL || window.webkitURL).revokeObjectURL(e) }, 0)
                        }, r, "number" == typeof i ? i / 100 : e)
                    },
                    xt = function(t, e, i) {
                        var n = i.querySelector(t);
                        n && (n.style.display = e ? "" : "none")
                    },
                    St = function(t) { return Array.prototype.slice.call(t) },
                    Et = function(t) { t.parentNode.removeChild(t) },
                    Ct = function(t) { var e = k("div"); return t.parentNode && (t.nextSibling ? t.parentNode.insertBefore(e, t.nextSibling) : t.parentNode.appendChild(e)), e.appendChild(t), e },
                    Pt = function(t, e, i, n) { var o = (n - 90) * Math.PI / 180; return { x: t + i * Math.cos(o), y: e + i * Math.sin(o) } },
                    Mt = function(t, e, i, n, o) {
                        var a = Pt(t, e, i, o),
                            r = Pt(t, e, i, n),
                            s = o - n <= 180 ? "0" : "1",
                            h = ["M", a.x, a.y, "A", i, i, 0, s, 0, r.x, r.y].join(" ");
                        return h
                    },
                    Rt = function(t, e, i, n) { return Mt(t, e, i, 0, 360 * n) },
                    Tt = function() {
                        var i = { n: function(t, e, i, n) { var o, a, r, s, h, u, l, p; return r = t.y + t.height, o = I(e.y, 0, r), r - o < i.min.height && (o = r - i.min.height), h = n ? (r - o) / n : t.width, h < i.min.width && (h = i.min.width, o = r - h * n), l = .5 * (h - t.width), s = t.x - l, a = t.x + t.width + l, (s < 0 || Math.round(a) > Math.round(i.width)) && (p = Math.min(t.x, i.width - (t.x + t.width)), s = t.x - p, a = t.x + t.width + p, h = a - s, u = h * n, o = r - u), { x: s, y: o, width: a - s, height: r - o } }, s: function(t, e, i, n) { var o, a, r, s, h, u, l, p; return o = t.y, r = I(e.y, o, i.height), r - o < i.min.height && (r = o + i.min.height), h = n ? (r - o) / n : t.width, h < i.min.width && (h = i.min.width, r = o + h * n), l = .5 * (h - t.width), s = t.x - l, a = t.x + t.width + l, (s < 0 || Math.round(a) > Math.round(i.width)) && (p = Math.min(t.x, i.width - (t.x + t.width)), s = t.x - p, a = t.x + t.width + p, h = a - s, u = h * n, r = o + u), { x: s, y: o, width: a - s, height: r - o } }, e: function(t, e, i, n) { var o, a, r, s, h, u, l, p; return s = t.x, a = I(e.x, s, i.width), a - s < i.min.width && (a = s + i.min.width), u = n ? (a - s) * n : t.height, u < i.min.height && (u = i.min.height, a = s + u / n), l = .5 * (u - t.height), o = t.y - l, r = t.y + t.height + l, (o < 0 || Math.round(r) > Math.round(i.height)) && (p = Math.min(t.y, i.height - (t.y + t.height)), o = t.y - p, r = t.y + t.height + p, u = r - o, h = u / n, a = s + h), { x: s, y: o, width: a - s, height: r - o } }, w: function n(t, e, i, o) { var a, r, s, h, n, u, l, p; return r = t.x + t.width, h = I(e.x, 0, r), r - h < i.min.width && (h = r - i.min.width), u = o ? (r - h) * o : t.height, u < i.min.height && (u = i.min.height, h = r - u / o), l = .5 * (u - t.height), a = t.y - l, s = t.y + t.height + l, (a < 0 || Math.round(s) > Math.round(i.height)) && (p = Math.min(t.y, i.height - (t.y + t.height)), a = t.y - p, s = t.y + t.height + p, u = s - a, n = u / o, h = r - n), { x: h, y: a, width: r - h, height: s - a } }, ne: function(t, e, i, n) { var o, a, r, s, h, u, l; return s = t.x, r = t.y + t.height, a = I(e.x, s, i.width), a - s < i.min.width && (a = s + i.min.width), u = n ? (a - s) * n : I(r - e.y, i.min.height, r), u < i.min.height && (u = i.min.height, a = s + u / n), o = t.y - (u - t.height), (o < 0 || Math.round(r) > Math.round(i.height)) && (l = Math.min(t.y, i.height - (t.y + t.height)), o = t.y - l, u = r - o, h = u / n, a = s + h), { x: s, y: o, width: a - s, height: r - o } }, se: function(t, e, i, n) { var o, a, r, s, h, u, l; return s = t.x, o = t.y, a = I(e.x, s, i.width), a - s < i.min.width && (a = s + i.min.width), u = n ? (a - s) * n : I(e.y - t.y, i.min.height, i.height - o), u < i.min.height && (u = i.min.height, a = s + u / n), r = t.y + t.height + (u - t.height), (o < 0 || Math.round(r) > Math.round(i.height)) && (l = Math.min(t.y, i.height - (t.y + t.height)), r = t.y + t.height + l, u = r - o, h = u / n, a = s + h), { x: s, y: o, width: a - s, height: r - o } }, sw: function(t, e, i, n) { var o, a, r, s, h, u, l; return a = t.x + t.width, o = t.y, s = I(e.x, 0, a), a - s < i.min.width && (s = a - i.min.width), u = n ? (a - s) * n : I(e.y - t.y, i.min.height, i.height - o), u < i.min.height && (u = i.min.height, s = a - u / n), r = t.y + t.height + (u - t.height), (o < 0 || Math.round(r) > Math.round(i.height)) && (l = Math.min(t.y, i.height - (t.y + t.height)), r = t.y + t.height + l, u = r - o, h = u / n, s = a - h), { x: s, y: o, width: a - s, height: r - o } }, nw: function(t, e, i, n) { var o, a, r, s, h, u, l; return a = t.x + t.width, r = t.y + t.height, s = I(e.x, 0, a), a - s < i.min.width && (s = a - i.min.width), u = n ? (a - s) * n : I(r - e.y, i.min.height, r), u < i.min.height && (u = i.min.height, s = a - u / n), o = t.y - (u - t.height), (o < 0 || Math.round(r) > Math.round(i.height)) && (l = Math.min(t.y, i.height - (t.y + t.height)), o = t.y - l, u = r - o, h = u / n, s = a - h), { x: s, y: o, width: a - s, height: r - o } } };
                        return function() {
                            function n() {
                                var i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : document.createElement("div");
                                t(this, n), this._element = i, this._interaction = null, this._minWidth = 1, this._minHeight = 1, this._ratio = null, this._rect = { x: 0, y: 0, width: 0, height: 0 }, this._space = { width: 0, height: 0 }, this._rectChanged = !1, this._init()
                            }
                            return p(n, [{
                                key: "_init",
                                value: function() {
                                    this._element.className = "slim-crop-area";
                                    var t = k("div", "grid");
                                    this._element.appendChild(t);
                                    for (var e in i)
                                        if (i.hasOwnProperty(e)) {
                                            var n = k("button", e);
                                            this._element.appendChild(n)
                                        }
                                    var o = k("button", "c");
                                    this._element.appendChild(o), x(document, y.DOWN, this)
                                }
                            }, { key: "reset", value: function() { this._interaction = null, this._rect = { x: 0, y: 0, width: 0, height: 0 }, this._rectChanged = !0, this._redraw(), this._element.dispatchEvent(new CustomEvent("change")) } }, { key: "rescale", value: function(t) { 1 !== t && (this._interaction = null, this._rectChanged = !0, this._rect.x *= t, this._rect.y *= t, this._rect.width *= t, this._rect.height *= t, this._redraw(), this._element.dispatchEvent(new CustomEvent("change"))) } }, { key: "limit", value: function(t, e) { this._space.width = t, this._space.height = e } }, { key: "offset", value: function(t, e) { this._space.x = t, this._space.y = e } }, { key: "resize", value: function(t, e, i, n) { this._interaction = null, this._rect = { x: I(t, 0, this._space.width - this._minWidth), y: I(e, 0, this._space.height - this._minHeight), width: I(i, this._minWidth, this._space.width), height: I(n, this._minHeight, this._space.height) }, this._rectChanged = !0, this._redraw(), this._element.dispatchEvent(new CustomEvent("change")) } }, {
                                key: "handleEvent",
                                value: function(t) {
                                    switch (t.type) {
                                        case "touchstart":
                                        case "pointerdown":
                                        case "mousedown":
                                            this._onStartDrag(t);
                                            break;
                                        case "touchmove":
                                        case "pointermove":
                                        case "mousemove":
                                            this._onDrag(t);
                                            break;
                                        case "touchend":
                                        case "touchcancel":
                                        case "pointerup":
                                        case "mouseup":
                                            this._onStopDrag(t)
                                    }
                                }
                            }, { key: "_onStartDrag", value: function(t) { this._element.contains(t.target) && (t.preventDefault(), x(document, y.MOVE, this), x(document, y.UP, this), this._interaction = { type: t.target.className, offset: P(t) }, this._interaction.offset.x -= this._rect.x, this._interaction.offset.y -= this._rect.y, this._element.setAttribute("data-dragging", "true"), this._redraw()) } }, {
                                key: "_onDrag",
                                value: function(t) {
                                    t.preventDefault();
                                    var e = P(t),
                                        n = this._interaction.type;
                                    "c" === n ? (this._rect.x = I(e.x - this._interaction.offset.x, 0, this._space.width - this._rect.width), this._rect.y = I(e.y - this._interaction.offset.y, 0, this._space.height - this._rect.height)) : i[n] && (this._rect = i[n](this._rect, { x: e.x - this._space.x, y: e.y - this._space.y }, { x: 0, y: 0, width: this._space.width, height: this._space.height, min: { width: this._minWidth, height: this._minHeight } }, this._ratio)), this._rectChanged = !0, this._element.dispatchEvent(new CustomEvent("input"))
                                }
                            }, { key: "_onStopDrag", value: function(t) { t.preventDefault(), S(document, y.MOVE, this), S(document, y.UP, this), this._interaction = null, this._element.setAttribute("data-dragging", "false"), this._element.dispatchEvent(new CustomEvent("change")) } }, {
                                key: "_redraw",
                                value: function() {
                                    var t = this;
                                    if (this._rectChanged) {
                                        var e = "translate(" + this._rect.x + "px," + this._rect.y + "px);";
                                        this._element.style.cssText = "\n\t\t\t\t\t-webkit-transform: " + e + ";\n\t\t\t\t\ttransform: " + e + ";\n\t\t\t\t\twidth:" + this._rect.width + "px;\n\t\t\t\t\theight:" + this._rect.height + "px;\n\t\t\t\t", this._rectChanged = !1
                                    }
                                    this._interaction && requestAnimationFrame(function() { return t._redraw() })
                                }
                            }, { key: "destroy", value: function() { this._interaction = !1, this._rectChanged = !1, S(document, y.DOWN, this), S(document, y.MOVE, this), S(document, y.UP, this), Et(this._element) } }, { key: "element", get: function() { return this._element } }, { key: "space", get: function() { return this._space } }, {
                                key: "area",
                                get: function() {
                                    var t = this._rect.x / this._space.width,
                                        e = this._rect.y / this._space.height,
                                        i = this._rect.width / this._space.width,
                                        n = this._rect.height / this._space.height;
                                    return { x: t, y: e, width: i, height: n }
                                }
                            }, { key: "dirty", get: function() { return 0 !== this._rect.x || 0 !== this._rect.y || 0 !== this._rect.width || 0 !== this._rect.height } }, { key: "minWidth", set: function(t) { this._minWidth = Math.max(t, 1) } }, { key: "minHeight", set: function(t) { this._minHeight = Math.max(t, 1) } }, { key: "ratio", set: function(t) { this._ratio = t } }]), n
                        }()
                    }(),
                    It = function() {
                        var i = ["input", "change"],
                            n = function() {
                                function n() {
                                    var i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : document.createElement("div"),
                                        o = arguments.length > 1 && arguments[1] !== e ? arguments[1] : {};
                                    t(this, n), this._element = i, this._options = g(n.options(), o), this._ratio = null, this._output = null, this._rotating = !1, this._input = null, this._preview = null, this._previewBlurred = null, this._blurredPreview = !1, this._cropper = null, this._straightCrop = null, this._previewWrapper = null, this._currentWindowSize = {}, this._btnGroup = null, this._maskFrame = null, this._dirty = !1, this._wrapperRotation = 0, this._wrapperScale = 1, this._init()
                                }
                                return p(n, [{
                                    key: "_init",
                                    value: function() {
                                        var t = this;
                                        this._element.className = "slim-image-editor", this._container = k("div", "slim-container"), this._wrapper = k("div", "slim-wrapper"), this._stage = k("div", "slim-stage"), this._container.appendChild(this._stage), this._cropper = new Tt, i.forEach(function(e) { t._cropper.element.addEventListener(e, t) }), this._stage.appendChild(this._cropper.element), this._previewWrapper = k("div", "slim-image-editor-preview slim-crop-preview"), this._previewBlurred = k("canvas", "slim-crop-blur"), this._previewWrapper.appendChild(this._previewBlurred), this._wrapper.appendChild(this._previewWrapper), this._previewMask = k("div", "slim-crop-mask"), this._preview = k("img"), this._previewMask.appendChild(this._preview), this._cropper.element.appendChild(this._previewMask), this._btnGroup = k("div", "slim-editor-btn-group"), n.Buttons.forEach(function(e) {
                                            var i = R(e),
                                                n = t._options["button" + i + "Label"],
                                                o = t._options["button" + i + "Title"],
                                                a = t._options["button" + i + "ClassName"],
                                                r = k("button", "slim-editor-btn slim-btn-" + e + (a ? " " + a : ""));
                                            r.innerHTML = n, r.title = o || n, r.type = "button", r.setAttribute("data-action", e), r.addEventListener("click", t), t._btnGroup.appendChild(r)
                                        }), this._utilsGroup = k("div", "slim-editor-utils-group");
                                        var e = k("button", "slim-editor-utils-btn slim-btn-rotate" + (this._options.buttonRotateClassName ? " " + this._options.buttonRotateClassName : ""));
                                        e.setAttribute("data-action", "rotate"), e.addEventListener("click", this), e.title = this._options.buttonRotateTitle, this._utilsGroup.appendChild(e), this._container.appendChild(this._wrapper), this._element.appendChild(this._container), this._element.appendChild(this._utilsGroup), this._element.appendChild(this._btnGroup)
                                    }
                                }, { key: "dirty", value: function() { this._dirty = !0 } }, {
                                    key: "handleEvent",
                                    value: function(t) {
                                        switch (t.type) {
                                            case "click":
                                                this._onClick(t);
                                                break;
                                            case "change":
                                                this._onGridChange(t);
                                                break;
                                            case "input":
                                                this._onGridInput(t);
                                                break;
                                            case "keydown":
                                                this._onKeyDown(t);
                                                break;
                                            case "resize":
                                                this._onResize(t)
                                        }
                                    }
                                }, {
                                    key: "_onKeyDown",
                                    value: function(t) {
                                        switch (t.keyCode) {
                                            case v.RETURN:
                                                this._confirm();
                                                break;
                                            case v.ESC:
                                                this._cancel()
                                        }
                                    }
                                }, { key: "_onClick", value: function(t) { t.target.classList.contains("slim-btn-cancel") && this._cancel(), t.target.classList.contains("slim-btn-confirm") && this._confirm(), t.target.classList.contains("slim-btn-rotate") && this._rotate() } }, { key: "_onResize", value: function() { this._currentWindowSize = { width: window.innerWidth, height: window.innerHeight }, this._redraw(), this._redrawCropper(this._cropper.area), this._updateWrapperScale(), this._redrawWrapper() } }, {
                                    key: "_redrawWrapper",
                                    value: function() {
                                        var t = u.createMatrix();
                                        t.scale(this._wrapperScale, this._wrapperScale), t.rotateZ(this._wrapperRotation * (Math.PI / 180)), u.setElementTransform(this._previewWrapper, t)
                                    }
                                }, { key: "_onGridInput", value: function() { this._redrawCropMask() } }, { key: "_onGridChange", value: function() { this._redrawCropMask() } }, { key: "_updateWrapperRotation", value: function() { this._options.minSize.width > this._input.height || this._options.minSize.height > this._input.width ? this._wrapperRotation += 180 : this._wrapperRotation += 90 } }, {
                                    key: "_updateWrapperScale",
                                    value: function() {
                                        var t = this._wrapperRotation % 180 !== 0;
                                        if (t) {
                                            var e = this._container.offsetWidth,
                                                i = this._container.offsetHeight,
                                                n = this._wrapper.offsetHeight,
                                                o = this._wrapper.offsetWidth,
                                                a = e / n;
                                            a * o > i && (a = i / o), this._wrapperScale = a
                                        } else this._wrapperScale = 1
                                    }
                                }, { key: "_cancel", value: function() { this._rotating || this._element.dispatchEvent(new CustomEvent("cancel")) } }, {
                                    key: "_confirm",
                                    value: function() {
                                        if (!this._rotating) {
                                            var t = this._wrapperRotation % 180 !== 0,
                                                e = this._cropper.area,
                                                i = dt(e, t ? this._input.height : this._input.width, t ? this._input.width : this._input.height);
                                            this._element.dispatchEvent(new CustomEvent("confirm", { detail: { rotation: this._wrapperRotation % 360, crop: i } }))
                                        }
                                    }
                                }, {
                                    key: "_rotate",
                                    value: function() {
                                        var t = this;
                                        if (!this._rotating) {
                                            this._rotating = !0, this._updateWrapperRotation();
                                            var e = 1 === this.ratio || null === this._ratio ? this._cropper.area : null;
                                            e && C(e, 90), this._updateWrapperScale(), this._hideCropper(), u(this._previewWrapper, { rotation: [0, 0, this._wrapperRotation * (Math.PI / 180)], scale: [this._wrapperScale, this._wrapperScale], easing: "spring", springConstant: .8, springDeceleration: .65, complete: function() { t._redrawCropper(e), t._showCropper(), t._rotating = !1 } })
                                        }
                                    }
                                }, { key: "_showCropper", value: function() { u(this._stage, { easing: "ease", duration: 250, fromOpacity: 0, opacity: 1 }) } }, { key: "_hideCropper", value: function() { u(this._stage, { duration: 0, fromOpacity: 0, opacity: 0 }) } }, {
                                    key: "_redrawCropMask",
                                    value: function() {
                                        var t = this,
                                            e = this._wrapperRotation % 360,
                                            i = this._wrapperScale,
                                            n = { width: this._wrapper.offsetWidth, height: this._wrapper.offsetHeight },
                                            o = this._cropper.area,
                                            a = { x: 0, y: 0 };
                                        0 === e ? (a.x = -o.x, a.y = -o.y) : 90 === e ? (a.x = -(1 - o.y), a.y = -o.x) : 180 === e ? (a.x = -(1 - o.x), a.y = -(1 - o.y)) : 270 === e && (a.x = -o.y, a.y = -(1 - o.x)), a.x *= n.width, a.y *= n.height, cancelAnimationFrame(this._maskFrame), this._maskFrame = requestAnimationFrame(function() {
                                            var n = "scale(" + i + ") rotate(" + -e + "deg) translate(" + a.x + "px, " + a.y + "px);";
                                            t._preview.style.cssText = "\n\t\t\t\t\twidth: " + t._previewSize.width + "px;\n\t\t\t\t\theight: " + t._previewSize.height + "px;\n\t\t\t\t\t-webkit-transform: " + n + ";\n\t\t\t\t\ttransform: " + n + ";\n\t\t\t\t"
                                        })
                                    }
                                }, {
                                    key: "open",
                                    value: function(t, e, i, n, o) {
                                        var a = this;
                                        if (this._input && !this._dirty && this._ratio === e) return void o();
                                        this._currentWindowSize = { width: window.innerWidth, height: window.innerHeight }, this._dirty = !1, this._wrapperRotation = n || 0, this._blurredPreview = !1, this._ratio = e, this._previewSize = null, this._element.style.opacity = "0", this._input = t;
                                        var r = n % 180 !== 0,
                                            s = ft(i, r ? t.height : t.width, r ? t.width : t.height);
                                        this._preview.onload = function() { a._preview.onload = null, a._cropper.ratio = a.ratio, a._redraw(), a._redrawCropper(s), o(), a._element.style.opacity = "" }, this._preview.src = "", this._preview.src = ht(this._input, Math.min(this._container.offsetWidth / this._input.width, this._container.offsetHeight / this._input.height) * this._options.devicePixelRatio).toDataURL()
                                    }
                                }, {
                                    key: "_redrawCropper",
                                    value: function(t) {
                                        var e = this._wrapperRotation % 180 !== 0,
                                            i = e ? this._input.height / this._input.width : this._input.width / this._input.height,
                                            n = this._wrapper.offsetWidth,
                                            o = this._wrapper.offsetHeight,
                                            a = this._container.offsetWidth,
                                            r = this._container.offsetHeight;
                                        this._updateWrapperScale();
                                        var s = this._wrapperScale * (e ? o : n),
                                            h = this._wrapperScale * (e ? n : o),
                                            u = e ? .5 * (a - s) : this._wrapper.offsetLeft,
                                            l = e ? .5 * (r - h) : this._wrapper.offsetTop;
                                        this._stage.style.cssText = "\n\t\t\t\tleft:" + u + "px;\n\t\t\t\ttop:" + l + "px;\n\t\t\t\twidth:" + s + "px;\n\t\t\t\theight:" + h + "px;\n\t\t\t", this._cropper.limit(s, s / i), this._cropper.offset(u + this._element.offsetLeft, l + this._element.offsetTop), this._cropper.minWidth = this._wrapperScale * this._options.minSize.width * this.scalar, this._cropper.minHeight = this._wrapperScale * this._options.minSize.height * this.scalar;
                                        var p = null;
                                        p = t ? { x: t.x * s, y: t.y * h, width: t.width * s, height: t.height * h } : tt(s, h, this._ratio || h / s), this._cropper.resize(p.x, p.y, p.width, p.height)
                                    }
                                }, {
                                    key: "_redraw",
                                    value: function() {
                                        var t = this._input.height / this._input.width,
                                            e = this._container.clientWidth,
                                            i = this._container.clientHeight,
                                            n = e,
                                            o = n * t;
                                        o > i && (o = i, n = o / t), n = Math.round(n), o = Math.round(o);
                                        var a = (e - n) / 2,
                                            r = (i - o) / 2;
                                        this._wrapper.style.cssText = "\n\t\t\t\tleft:" + a + "px;\n\t\t\t\ttop:" + r + "px;\n\t\t\t\twidth:" + n + "px;\n\t\t\t\theight:" + o + "px;\n\t\t\t", this._previewBlurred.style.cssText = "\n\t\t\t\twidth:" + n + "px;\n\t\t\t\theight:" + o + "px;\n\t\t\t", this._preview.style.cssText = "\n\t\t\t\twidth:" + n + "px;\n\t\t\t\theight:" + o + "px;\n\t\t\t", this._previewSize = { width: n, height: o }, this._blurredPreview || (this._previewBlurred.width = 300, this._previewBlurred.height = this._previewBlurred.width * t, lt(this._input, this._previewBlurred), pt(this._previewBlurred, 3), this._blurredPreview = !0)
                                    }
                                }, {
                                    key: "show",
                                    value: function() {
                                        var t = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function() {};
                                        this._currentWindowSize.width === window.innerWidth && this._currentWindowSize.height === window.innerHeight || (this._redraw(), this._redrawCropper(this._cropper.area)), document.addEventListener("keydown", this), window.addEventListener("resize", this);
                                        var i = this._wrapperRotation * (Math.PI / 180);
                                        u(this._previewWrapper, { fromRotation: [0, 0, i], rotation: [0, 0, i], fromPosition: [0, 0, 0], position: [0, 0, 0], fromOpacity: 0, opacity: 1, fromScale: [this._wrapperScale - .02, this._wrapperScale - .02], scale: [this._wrapperScale, this._wrapperScale], easing: "spring", springConstant: .3, springDeceleration: .85, delay: 450, complete: function() {} }), this._cropper.dirty ? u(this._stage, { fromPosition: [0, 0, 0], position: [0, 0, 0], fromOpacity: 0, opacity: 1, duration: 250, delay: 850, complete: function() { z(this), t() } }) : u(this._stage, { fromPosition: [0, 0, 0], position: [0, 0, 0], fromOpacity: 0, opacity: 1, duration: 250, delay: 1e3, complete: function() { z(this) } }), u(this._btnGroup.childNodes, { fromScale: [.9, .9], scale: [1, 1], fromOpacity: 0, opacity: 1, delay: function(t) { return 1e3 + 100 * t }, easing: "spring", springConstant: .3, springDeceleration: .85, complete: function() { z(this) } }), u(this._utilsGroup.childNodes, { fromScale: [.9, .9], scale: [1, 1], fromOpacity: 0, opacity: 1, easing: "spring", springConstant: .3, springDeceleration: .85, delay: 1250, complete: function() { z(this) } })
                                    }
                                }, {
                                    key: "hide",
                                    value: function() {
                                        var t = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function() {};
                                        document.removeEventListener("keydown", this), window.removeEventListener("resize", this), u(this._utilsGroup.childNodes, { fromOpacity: 1, opacity: 0, duration: 250 }), u(this._btnGroup.childNodes, { fromOpacity: 1, opacity: 0, delay: 200, duration: 350 }), u([this._stage, this._previewWrapper], { fromPosition: [0, 0, 0], position: [0, -250, 0], fromOpacity: 1, opacity: 0, easing: "spring", springConstant: .3, springDeceleration: .75, delay: 250, allDone: function() { t() } })
                                    }
                                }, {
                                    key: "destroy",
                                    value: function() {
                                        var t = this;
                                        St(this._btnGroup.children).forEach(function(e) { e.removeEventListener("click", t) }), i.forEach(function(e) { t._cropper.element.removeEventListener(e, t) }), this._cropper.destroy(), this._element.parentNode && Et(this._element)
                                    }
                                }, { key: "showRotateButton", set: function(t) { t ? this._element.classList.remove("slim-rotation-disabled") : this._element.classList.add("slim-rotation-disabled") } }, { key: "element", get: function() { return this._element } }, { key: "ratio", get: function() { return "input" === this._ratio ? this._input.height / this._input.width : this._ratio } }, { key: "offset", get: function() { return this._element.getBoundingClientRect() } }, { key: "original", get: function() { return this._input } }, { key: "scalar", get: function() { return this._previewSize.width / this._input.width } }], [{ key: "options", value: function() { return { buttonCancelClassName: null, buttonConfirmClassName: null, buttonCancelLabel: "Cancel", buttonConfirmLabel: "Confirm", buttonCancelTitle: null, buttonConfirmTitle: null, buttonRotateTitle: "Rotate", buttonRotateClassName: null, devicePixelRatio: null, minSize: { width: 0, height: 0 } } } }]), n
                            }();
                        return n.Buttons = ["cancel", "confirm"], n
                    }(Tt),
                    Lt = function() {
                        var i = ["dragenter", "dragover", "dragleave", "drop"];
                        return function() {
                            function n() {
                                var i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : document.createElement("div");
                                t(this, n), this._element = i, this._accept = [], this._allowURLs = !1, this._dragPath = null, this._init()
                            }
                            return p(n, [{ key: "isValidDataTransfer", value: function(t) { return t.files && t.files.length ? this.areValidDataTransferFiles(t.files) : t.items && t.items.length ? this.areValidDataTransferItems(t.items) : null } }, { key: "areValidDataTransferFiles", value: function(t) { return !this._accept.length || !t || this._accept.indexOf(t[0].type) !== -1 } }, { key: "areValidDataTransferItems", value: function(t) { return !this._accept.length || !t || (this._allowURLs && "string" === t[0].kind ? null : t[0].type && 0 === t[0].type.indexOf("application") ? null : this._accept.indexOf(t[0].type) !== -1) } }, { key: "reset", value: function() { this._element.files = null } }, {
                                key: "_init",
                                value: function() {
                                    var t = this;
                                    this._element.className = "slim-file-hopper", i.forEach(function(e) { t._element.addEventListener(e, t) })
                                }
                            }, {
                                key: "handleEvent",
                                value: function(t) {
                                    switch (t.type) {
                                        case "dragenter":
                                        case "dragover":
                                            this._onDragOver(t);
                                            break;
                                        case "dragleave":
                                            this._onDragLeave(t);
                                            break;
                                        case "drop":
                                            this._onDrop(t)
                                    }
                                }
                            }, {
                                key: "_onDrop",
                                value: function(t) {
                                    t.preventDefault();
                                    var e = null;
                                    if (this._allowURLs) {
                                        var i = void 0,
                                            n = void 0;
                                        try { i = t.dataTransfer.getData("url"), n = t.dataTransfer.getData("text/html") } catch (t) {}
                                        if (n && n.length) {
                                            var o = n.match(/src\s*=\s*"(.+?)"/);
                                            o && (e = o[1])
                                        } else i && i.length && (e = i)
                                    }
                                    if (e) this._element.files = [{ remote: e }];
                                    else {
                                        var a = this.isValidDataTransfer(t.dataTransfer);
                                        if (!a) return this._element.dispatchEvent(new CustomEvent("file-invalid-drop")), void(this._dragPath = null);
                                        this._element.files = t.dataTransfer.files
                                    }
                                    this._element.dispatchEvent(new CustomEvent("file-drop", { detail: m(t) })), this._element.dispatchEvent(new CustomEvent("change")), this._dragPath = null
                                }
                            }, { key: "_onDragOver", value: function(t) { t.preventDefault(), t.dataTransfer.dropEffect = "copy"; var e = this.isValidDataTransfer(t.dataTransfer); return null === e || e ? (this._dragPath || (this._dragPath = []), this._dragPath.push(m(t)), void this._element.dispatchEvent(new CustomEvent("file-over", { detail: { x: T(this._dragPath).x, y: T(this._dragPath).y } }))) : (t.dataTransfer.dropEffect = "none", void this._element.dispatchEvent(new CustomEvent("file-invalid"))) } }, { key: "_onDragLeave", value: function(t) { this._element.dispatchEvent(new CustomEvent("file-out", { detail: m(t) })), this._dragPath = null } }, {
                                key: "destroy",
                                value: function() {
                                    var t = this;
                                    i.forEach(function(e) { t._element.removeEventListener(e, t) }), Et(this._element), this._element = null, this._dragPath = null, this._accept = null
                                }
                            }, { key: "element", get: function() { return this._element } }, { key: "dragPath", get: function() { return this._dragPath } }, { key: "enabled", get: function() { return "" === this._element.style.display }, set: function(t) { this._element.style.display = t ? "" : "none" } }, { key: "allowURLs", set: function(t) { this._allowURLs = t } }, { key: "accept", set: function(t) { this._accept = t }, get: function() { return this._accept } }]), n
                        }()
                    }(),
                    Ot = function() {
                        return function() {
                            function i() { t(this, i), this._element = null, this._inner = null, this._init() }
                            return p(i, [{ key: "_init", value: function() { this._element = k("div", "slim-popover"), this._element.setAttribute("data-state", "off"), document.body.appendChild(this._element), this._element.addEventListener("touchmove", function(t) { t.preventDefault() }, !0) } }, {
                                key: "show",
                                value: function() {
                                    var t = this,
                                        i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function() {};
                                    this._element.setAttribute("data-state", "on"), u(this._element, { fromOpacity: 0, opacity: 1, duration: 350, complete: function() { z(t._element), i() } })
                                }
                            }, {
                                key: "hide",
                                value: function() {
                                    var t = this,
                                        i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function() {};
                                    u(this._element, { fromOpacity: 1, opacity: 0, duration: 500, complete: function() { z(t._element), t._element.setAttribute("data-state", "off"), i() } })
                                }
                            }, { key: "destroy", value: function() { this._element.parentNode && (this._element.parentNode.removeChild(this._element), this._element = null, this._inner = null) } }, { key: "inner", set: function(t) { this._inner = t, this._element.firstChild && this._element.removeChild(this._element.firstChild), this._element.appendChild(this._inner) } }, { key: "className", set: function(t) { this._element.className = "slim-popover" + (null === t ? "" : " " + t) } }]), i
                        }()
                    }(),
                    zt = function(t, e) { return t.split(e).map(function(t) { return parseInt(t, 10) }) },
                    Dt = function(t) { return "DIV" === t.nodeName || "SPAN" === t.nodeName },
                    At = { AUTO: "auto", INITIAL: "initial", MANUAL: "manual" },
                    Ut = ["x", "y", "width", "height"],
                    Ht = ["file-invalid-drop", "file-invalid", "file-drop", "file-over", "file-out", "click"],
                    Nt = ["cancel", "confirm"],
                    Bt = ["remove", "edit", "download", "upload"],
                    Ft = null,
                    Wt = 0,
                    qt = '\n<div class="slim-loader">\n\t<svg>\n\t\t<path class="slim-loader-background" fill="none" stroke-width="3" />\n\t\t<path class="slim-loader-foreground" fill="none" stroke-width="3" />\n\t</svg>\n</div>\n',
                    jt = '\n<div class="slim-upload-status"></div>\n',
                    Vt = function(t) { var e = t.split(","); return { width: parseInt(e[0], 10), height: parseInt(e[1], 10) } },
                    Gt = function() {
                        function i(n) {
                            var o = arguments.length > 1 && arguments[1] !== e ? arguments[1] : {};
                            t(this, i), Ft || (Ft = new Ot), this._uid = Wt++, this._options = g(i.options(), o), this._options.forceSize && ("string" == typeof this._options.forceSize && (this._options.forceSize = Vt(this._options.forceSize)), this._options.ratio = this._options.forceSize.width + ":" + this._options.forceSize.height, this._options.size = mt(this._options.forceSize)), "string" == typeof this._options.size && (this._options.size = Vt(this._options.size)), "string" == typeof this._options.minSize && (this._options.minSize = Vt(this._options.minSize)), "string" == typeof this._options.post && (this._options.post = this._options.post.split(",").map(function(t) { return t.trim() })), this._originalElement = n, this._originalElementInner = n.innerHTML, this._originalElementAttributes = _(n), Dt(n) ? this._element = n : (this._element = Ct(n), this._element.className = n.className, n.className = "", this._element.setAttribute("data-ratio", this._options.ratio)), this._element.classList.add("slim"), this._element.setAttribute("data-state", "init"), this._state = [], this._timers = [], this._input = null, this._inputReference = null, this._output = null, this._ratio = null, this._isRequired = !1, this._imageHopper = null, this._imageEditor = null, this._progressEnabled = !0, this._data = {}, this._resetData(), this._drip = null, this._hasInitialImage = !1, this._initialCrop = this._options.crop, this._initialRotation = this._options.rotation && this._options.rotation % 90 === 0 ? this._options.rotation : null, this._isBeingDestroyed = !1, i.supported ? this._init() : this._fallback()
                        }
                        return p(i, [{
                            key: "setRotation",
                            value: function(t, e) {
                                if ("number" == typeof t || t % 90 === 0) {
                                    this._data.actions.rotation = t;
                                    var i = this._data.actions.rotation % 180 !== 0;
                                    if (this._data.input.image) {
                                        var n = i ? this._data.input.image.height : this._data.input.image.width,
                                            o = i ? this._data.input.image.width : this._data.input.image.height;
                                        this._data.actions.crop = tt(n, o, this._ratio), this._data.actions.crop.type = At.AUTO
                                    }
                                    this._data.input.image && e && this._manualTransform(e)
                                }
                            }
                        }, { key: "setSize", value: function(t, e) { "string" == typeof t && (t = Vt(t)), t && t.width && t.height && (this._options.size = mt(t), this._data.actions.size = mt(t), this._data.input.image && e && this._manualTransform(e)) } }, { key: "setForceSize", value: function(t, e) { "string" == typeof t && (t = Vt(t)), t && t.width && t.height && (this._options.size = mt(t), this._options.forceSize = mt(t), this._data.actions.size = mt(t), this.setRatio(this._options.forceSize.width + ":" + this._options.forceSize.height, e)) } }, {
                            key: "setRatio",
                            value: function(t, e) {
                                var i = this;
                                if (t && "string" == typeof t && (this._options.ratio = t, this._isFixedRatio())) {
                                    var n = zt(this._options.ratio, ":");
                                    this._ratio = n[1] / n[0], this._data.input.image && e ? this._cropAuto(function(t) { i._scaleDropArea(i._ratio), e && e(t) }) : (this._data.input.image && (this._data.actions.crop = tt(this._data.input.image.width, this._data.input.image.height, this._ratio), this._data.actions.crop.type = At.AUTO), this._scaleDropArea(this._ratio), e && e(null))
                                }
                            }
                        }, {
                            key: "isAttachedTo",
                            value: function(t) {
                                return this._element === t || this._originalElement === t;
                            }
                        }, { key: "isDetached", value: function() { return null === this._element.parentNode } }, {
                            key: "load",
                            value: function(t) {
                                var i = arguments.length > 1 && arguments[1] !== e ? arguments[1] : {},
                                    n = arguments[2];
                                "function" == typeof i ? n = i : (this._options.crop = i.crop, this._options.rotation = i.rotation, this._initialRotation = i.rotation && i.rotation % 90 === 0 ? i.rotation : null, this._initialCrop = this._options.crop), this._load(t, n, { blockPush: i.blockPush })
                            }
                        }, { key: "upload", value: function(t) { this._doUpload(t) } }, { key: "download", value: function() { this._doDownload() } }, { key: "remove", value: function() { return this._doRemove() } }, { key: "destroy", value: function() { this._doDestroy() } }, { key: "edit", value: function() { this._doEdit() } }, { key: "crop", value: function(t, e) { this._crop(t.x, t.y, t.width, t.height, e) } }, { key: "containsImage", value: function() { return null !== this._data.input.name } }, { key: "_canInstantEdit", value: function() { return this._options.instantEdit && !this._isInitialising } }, { key: "_getFileInput", value: function() { return this._element.querySelector("input[type=file]") } }, { key: "_getInitialImage", value: function() { return this._element.querySelector("img") } }, { key: "_getInputElement", value: function() { return this._getFileInput() || this._getInitialImage() } }, { key: "_getRatioSpacerElement", value: function() { return this._element.children[0] } }, { key: "_isImageOnly", value: function() { return "INPUT" !== this._input.nodeName } }, { key: "_isFixedRatio", value: function() { return this._options.ratio.indexOf(":") !== -1 } }, { key: "_isAutoCrop", value: function() { return this._data.actions.crop.type === At.AUTO } }, { key: "_toggleButton", value: function(t, e) { xt('.slim-btn[data-action="' + t + '"]', e, this._element) } }, { key: "_clearState", value: function() { this._state = [], this._updateState() } }, { key: "_removeState", value: function(t) { this._state = this._state.filter(function(e) { return e !== t }), this._updateState() } }, { key: "_addState", value: function(t) { L(t, this._state) || (this._state.push(t), this._updateState()) } }, { key: "_updateState", value: function() { this._element && this._element.setAttribute("data-state", this._state.join(",")) } }, { key: "_resetData", value: function() { this._data = { server: null, meta: mt(this._options.meta), input: { field: this._inputReference, name: null, type: null, width: 0, height: 0, file: null }, output: { image: null, width: 0, height: 0 }, actions: { rotation: null, crop: null, size: null } }, this._output && (this._output.value = ""), _t(this._getFileInput()) } }, {
                            key: "_init",
                            value: function() {
                                var t = this;
                                if (this._isInitialising = !0, this._addState("empty"), L("input", this._options.post) && (this._inputReference = "slim_input_" + this._uid), this._input = this._getInputElement(), this._input || (this._input = k("input"), this._input.type = "file", this._element.appendChild(this._input)), this._isRequired = this._input.required === !0, this._output = this._element.querySelector("input[type=hidden]"), this._output) {
                                    var e = null;
                                    try { e = JSON.parse(this._output.value) } catch (i) {}
                                    if (e) {
                                        var n = new Image;
                                        n.src = e.output.image, n.setAttribute("data-filename", e.output.name), this._element.insertBefore(n, this._element.firstChild)
                                    }
                                } else this._output = k("input"), this._output.type = "hidden", this._output.name = this._input.name || this._options.defaultInputName, this._element.appendChild(this._output);
                                this._input.removeAttribute("name");
                                var o = k("div", "slim-area"),
                                    a = this._getInitialImage(),
                                    r = (a || {}).src,
                                    s = a ? a.getAttribute("data-filename") : null;
                                r ? this._hasInitialImage = !0 : (this._initialCrop = null, this._initialRotation = null);
                                var h = '\n\t\t<div class="slim-result">\n\t\t\t<img class="in" style="opacity:0" ' + (r ? 'src="' + r + '"' : "") + '><img><img style="opacity:0">\n\t\t</div>';
                                if (this._isImageOnly()) o.innerHTML = "\n\t\t\t\t" + qt + "\n\t\t\t\t" + jt + "\n\t\t\t\t" + h + '\n\t\t\t\t<div class="slim-status"><div class="slim-label-loading">' + (this._options.labelLoading || "") + "</div></div>\n\t\t\t";
                                else {
                                    L("input", this._options.post) && (this._data.input.field = this._inputReference, this._options.service || (this._input.name = this._inputReference));
                                    var u = void 0;
                                    this._input.hasAttribute("accept") && "image/*" !== this._input.getAttribute("accept") ? u = this._input.accept.split(",").map(function(t) { return t.trim() }).filter(function(t) { return t.length > 0 }) : (u = A(), this._input.setAttribute("accept", u.join(","))), this._imageHopper = new Lt, this._imageHopper.accept = u, this._imageHopper.allowURLs = "string" == typeof this._options.fetcher, this._element.appendChild(this._imageHopper.element), Ht.forEach(function(e) { t._imageHopper.element.addEventListener(e, t) }), o.innerHTML = "\n\t\t\t\t" + qt + "\n\t\t\t\t" + jt + '\n\t\t\t\t<div class="slim-drip"><span><span></span></span></div>\n\t\t\t\t<div class="slim-status"><div class="slim-label">' + (this._options.label || "") + '</div><div class="slim-label-loading">' + (this._options.labelLoading || "") + "</div></div>\n\t\t\t\t" + h + "\n\t\t\t", this._input.addEventListener("change", this)
                                }
                                if (this._element.appendChild(o), this._btnGroup = k("div", "slim-btn-group"), this._btnGroup.style.display = "none", this._element.appendChild(this._btnGroup), Bt.filter(function(e) { return t._isButtonAllowed(e) }).forEach(function(e) {
                                        var i = R(e),
                                            n = t._options["button" + i + "Label"],
                                            o = t._options["button" + i + "Title"] || n,
                                            a = t._options["button" + i + "ClassName"],
                                            r = k("button", "slim-btn slim-btn-" + e + (a ? " " + a : ""));
                                        r.innerHTML = n, r.title = o, r.type = "button", r.addEventListener("click", t), r.setAttribute("data-action", e), t._btnGroup.appendChild(r)
                                    }), this._isFixedRatio()) {
                                    var l = zt(this._options.ratio, ":");
                                    this._ratio = l[1] / l[0], this._scaleDropArea(this._ratio)
                                }
                                this._updateProgress(.5), r ? this._load(r, function() { t._onInit() }, { name: s }) : this._onInit()
                            }
                        }, {
                            key: "_onInit",
                            value: function() {
                                var t = this;
                                this._isInitialising = !1;
                                var e = function() {
                                    var e = setTimeout(function() { t._options.didInit.apply(t, [t.data, t]) }, 0);
                                    t._timers.push(e)
                                };
                                this._options.saveInitialImage && this.containsImage() ? this._options.service || this._save(function() { e() }, !1) : (this._options.service && this.containsImage() && this._toggleButton("upload", !1), e())
                            }
                        }, {
                            key: "_updateProgress",
                            value: function(t) {
                                if (t = Math.min(.99999, t), this._element && this._progressEnabled) {
                                    var e = this._element.querySelector(".slim-loader");
                                    if (e) {
                                        var i = e.offsetWidth,
                                            n = e.querySelectorAll("path"),
                                            o = parseInt(n[0].getAttribute("stroke-width"), 10);
                                        n[0].setAttribute("d", Rt(.5 * i, .5 * i, .5 * i - o, .9999)), n[1].setAttribute("d", Rt(.5 * i, .5 * i, .5 * i - o, t))
                                    }
                                }
                            }
                        }, {
                            key: "_startProgress",
                            value: function(t) {
                                var e = this;
                                if (this._element) {
                                    this._progressEnabled = !1;
                                    var i = this._element.querySelector(".slim-loader");
                                    if (i) {
                                        var n = i.children[0];
                                        this._stopProgressLoop(function() { i.removeAttribute("style"), n.removeAttribute("style"), e._progressEnabled = !0, e._updateProgress(0), e._progressEnabled = !1, u(n, { fromOpacity: 0, opacity: 1, duration: 250, complete: function() { e._progressEnabled = !0, t && t() } }) })
                                    }
                                }
                            }
                        }, {
                            key: "_stopProgress",
                            value: function() {
                                var t = this;
                                if (this._element) {
                                    var e = this._element.querySelector(".slim-loader");
                                    if (e) {
                                        var i = e.children[0];
                                        this._updateProgress(1), u(i, { fromOpacity: 1, opacity: 0, duration: 250, complete: function() { e.removeAttribute("style"), i.removeAttribute("style"), t._updateProgress(.5), t._progressEnabled = !1 } })
                                    }
                                }
                            }
                        }, {
                            key: "_startProgressLoop",
                            value: function() {
                                if (this._element) {
                                    var t = this._element.querySelector(".slim-loader");
                                    if (t) {
                                        var e = t.children[0];
                                        t.removeAttribute("style"), e.removeAttribute("style"), this._updateProgress(.5);
                                        var i = 1e3;
                                        u(t, "stop"), u(t, { rotation: [0, 0, -(2 * Math.PI) * i], easing: "linear", duration: 1e3 * i }), u(e, { fromOpacity: 0, opacity: 1, duration: 250 })
                                    }
                                }
                            }
                        }, {
                            key: "_stopProgressLoop",
                            value: function(t) {
                                if (this._element) {
                                    var e = this._element.querySelector(".slim-loader");
                                    if (e) {
                                        var i = e.children[0];
                                        u(i, { fromOpacity: parseFloat(i.style.opacity), opacity: 0, duration: 250, complete: function() { u(e, "stop"), e.removeAttribute("style"), i.removeAttribute("style"), t && t() } })
                                    }
                                }
                            }
                        }, { key: "_isButtonAllowed", value: function(t) { return "edit" === t ? this._options.edit : "download" === t ? this._options.download : "upload" === t ? !!this._options.service && !this._options.push : "remove" !== t || !this._isImageOnly() } }, {
                            key: "_fallback",
                            value: function() {
                                var t = k("div", "slim-area");
                                t.innerHTML = '\n\t\t\t<div class="slim-status"><div class="slim-label">' + (this._options.label || "") + "</div></div>\n\t\t", this._element.appendChild(t), this._throwError(this._options.statusNoSupport)
                            }
                        }, {
                            key: "handleEvent",
                            value: function(t) {
                                switch (t.type) {
                                    case "click":
                                        this._onClick(t);
                                        break;
                                    case "change":
                                        this._onChange(t);
                                        break;
                                    case "cancel":
                                        this._onCancel(t);
                                        break;
                                    case "confirm":
                                        this._onConfirm(t);
                                        break;
                                    case "file-over":
                                        this._onFileOver(t);
                                        break;
                                    case "file-out":
                                        this._onFileOut(t);
                                        break;
                                    case "file-drop":
                                        this._onDropFile(t);
                                        break;
                                    case "file-invalid":
                                        this._onInvalidFile(t);
                                        break;
                                    case "file-invalid-drop":
                                        this._onInvalidFileDrop(t)
                                }
                            }
                        }, { key: "_getIntro", value: function() { return this._element.querySelector(".slim-result .in") } }, { key: "_getOutro", value: function() { return this._element.querySelector(".slim-result .out") } }, { key: "_getInOut", value: function() { return this._element.querySelectorAll(".slim-result img") } }, { key: "_getDrip", value: function() { return this._drip || (this._drip = this._element.querySelector(".slim-drip > span")), this._drip } }, {
                            key: "_throwError",
                            value: function(t) {
                                this._addState("error"), this._element.querySelector(".slim-label").style.display = "none";
                                var e = this._element.querySelector(".slim-error");
                                e || (e = k("div", "slim-error"), this._element.querySelector(".slim-status").appendChild(e)), e.innerHTML = t, this._options.didThrowError.apply(this, [t])
                            }
                        }, {
                            key: "_removeError",
                            value: function() {
                                this._removeState("error"), this._element.querySelector(".slim-label").style.display = "";
                                var t = this._element.querySelector(".slim-error");
                                t && t.parentNode.removeChild(t)
                            }
                        }, { key: "_openFileDialog", value: function() { this._removeError(), this._input.click() } }, {
                            key: "_onClick",
                            value: function(t) {
                                var e = this,
                                    i = t.target.classList,
                                    n = t.target;
                                if (i.contains("slim-file-hopper")) return t.preventDefault(), void this._openFileDialog();
                                switch (n.getAttribute("data-action")) {
                                    case "remove":
                                        this._options.willRemove.apply(this, [this.data, function() { e._doRemove() }]);
                                        break;
                                    case "edit":
                                        this._doEdit();
                                        break;
                                    case "download":
                                        this._doDownload();
                                        break;
                                    case "upload":
                                        this._doUpload()
                                }
                            }
                        }, {
                            key: "_onInvalidFileDrop",
                            value: function() {
                                this._onInvalidFile(), this._removeState("file-over");
                                var t = this._getDrip();
                                u(t.firstChild, { fromScale: [.5, .5], scale: [0, 0], fromOpacity: .5, opacity: 0, duration: 150, complete: function() { z(t.firstChild) } })
                            }
                        }, {
                            key: "_onInvalidFile",
                            value: function() {
                                var t = this._imageHopper.accept.map(H),
                                    e = this._options.statusFileType.replace("$0", t.join(", "));
                                this._throwError(e)
                            }
                        }, {
                            key: "_onImageTooSmall",
                            value: function() {
                                var t = this._options.statusImageTooSmall.replace("$0", this._options.minSize.width + " × " + this._options.minSize.height);
                                this._throwError(t)
                            }
                        }, {
                            key: "_onOverWeightFile",
                            value: function() {
                                var t = this._options.statusFileSize.replace("$0", this._options.maxFileSize);
                                this._throwError(t)
                            }
                        }, { key: "_onLocalURLProblem", value: function(t) { this._throwError(this._options.statusLocalUrlProblem || t) } }, { key: "_onRemoteURLProblem", value: function(t) { this._throwError(t) } }, {
                            key: "_onFileOver",
                            value: function(t) {
                                this._addState("file-over"), this._removeError();
                                var e = this._getDrip(),
                                    i = u.createMatrix();
                                i.translate(t.detail.x, t.detail.y, 0), u.setElementTransform(e, i), 1 == this._imageHopper.dragPath.length && (e.style.opacity = 1, u(e.firstChild, { fromOpacity: 0, opacity: .5, fromScale: [0, 0], scale: [.5, .5], duration: 150 }))
                            }
                        }, {
                            key: "_onFileOut",
                            value: function(t) {
                                this._removeState("file-over"), this._removeState("file-invalid"), this._removeError();
                                var e = this._getDrip(),
                                    i = u.createMatrix();
                                i.translate(t.detail.x, t.detail.y, 0), u.setElementTransform(e, i), u(e.firstChild, { fromScale: [.5, .5], scale: [0, 0], fromOpacity: .5, opacity: 0, duration: 150, complete: function() { z(e.firstChild) } })
                            }
                        }, {
                            key: "_onDropFile",
                            value: function(t) {
                                var e = this;
                                this._removeState("file-over");
                                var i = this._getDrip(),
                                    n = u.createMatrix();
                                n.translate(t.detail.x, t.detail.y, 0), u.setElementTransform(i, n);
                                var o = this._imageHopper.dragPath.length,
                                    a = this._imageHopper.dragPath[o - Math.min(10, o)],
                                    r = t.detail.x - a.x,
                                    s = t.detail.y - a.y;
                                u(i, { fromPosition: [t.detail.x, t.detail.y, 0], position: [t.detail.x + r, t.detail.y + s, 0], duration: 200 }), u(i.firstChild, { fromScale: [.5, .5], scale: [2, 2], fromOpacity: 1, opacity: 0, duration: 200, complete: function() { z(i.firstChild), e._load(t.target.files[0]) } })
                            }
                        }, { key: "_onChange", value: function(t) { t.target.files.length && this._load(t.target.files[0]) } }, {
                            key: "_load",
                            value: function(t, i) {
                                var n = this,
                                    o = arguments.length > 2 && arguments[2] !== e ? arguments[2] : {};
                                if (!this._isBeingDestroyed) {
                                    if (this.containsImage()) return clearTimeout(this._replaceTimeout), void this._doRemove(function() { n._replaceTimeout = setTimeout(function() { n._load(t, i, o) }, 100) });
                                    this._removeState("empty"), this._addState("busy"), this._startProgressLoop(), this._imageHopper && (this._imageHopper.enabled = !1), clearTimeout(this._loadTimeout);
                                    var a = function() { clearTimeout(n._loadTimeout), n._loadTimeout = setTimeout(function() { n._isBeingDestroyed || (n._addState("loading"), u(n._element.querySelector(".slim-label-loading"), { fromOpacity: 0, opacity: 1, duration: 250 })) }, 500) },
                                        r = function() { n._imageHopper && (n._imageHopper.enabled = !0), n._removeState("loading"), n._removeState("busy"), n._addState("empty"), n._stopProgressLoop() };
                                    if ("string" == typeof t) return void(X(t) ? this._load(Z(t), i, o) : (a(), J(t, this._options.willLoad, function(t) { n._load(t, i, o) }, function(t) { setTimeout(function() { r(), n._onLocalURLProblem("<p>" + t + "</p>"), i && i.apply(n, ["local-url-problem"]) }, 500) })));
                                    if ("undefined" != typeof t.remote) return X(t.remote) ? void this._load(Z(t.remote), i, o) : void(this._options.fetcher && Y(this._options.fetcher, this._options.willFetch, this._options.willLoad, t.remote, function(t) { r(), n._onRemoteURLProblem("<p>" + t + "</p>"), i && i.apply(n, ["remote-url-problem"]) }, function(t) { n._load(t, i, o) }));
                                    var s = t;
                                    if (this._imageHopper && this._imageHopper.accept.indexOf(s.type) === -1) return r(), this._onInvalidFile(), void(i && i.apply(this, ["file-invalid"]));
                                    if (s.size && this._options.maxFileSize && D(s.size) > this._options.maxFileSize) return r(), this._onOverWeightFile(), void(i && i.apply(this, ["file-too-big"]));
                                    this._imageEditor && this._imageEditor.dirty(), this._data.input.name = o && o.name ? o.name : q(s), this._data.input.type = j(s), this._data.input.size = s.size, this._data.input.file = s, Q(s, this._options.internalCanvasSize, function(t, e) {
                                        var a = function() { n._imageHopper && (n._imageHopper.enabled = !0), n._removeState("loading"), n._removeState("busy"), n._addState("empty"), n._stopProgressLoop(), n._resetData() };
                                        if (!t) return a(), void(i && i.apply(n, ["file-not-found"]));
                                        if (!ct(t, n._options.minSize)) return a(), n._onImageTooSmall(), void(i && i.apply(n, ["image-too-small"]));
                                        var r = n._options.didLoad.apply(n, [s, t, e, n]);
                                        if (r !== !0) return a(), r !== !1 && n._throwError(r), void(i && i.apply(n, [r]));
                                        n._removeState("loading");
                                        var h = function(t) {
                                            n._imageHopper && n._options.dropReplace && (n._imageHopper.enabled = !0);
                                            var e = n._getIntro(),
                                                i = { fromScale: [1.25, 1.25], scale: [1, 1], fromOpacity: 0, opacity: 1, complete: function() { z(e), e.style.opacity = 1, t() } };
                                            n.isDetached() ? i.duration = 1 : (i.easing = "spring", i.springConstant = .3, i.springDeceleration = .7), n._canInstantEdit() && (i.delay = 500, i.duration = 1, n._doEdit()), u(e, i)
                                        };
                                        n._loadCanvas(t, function(t) { n._addState("preview"), h(function() { n._canInstantEdit() || t || n._showButtons(), t || (n._stopProgressLoop(), n._removeState("busy")), i && i.apply(n, [null, n.data]) }) }, function() { n._canInstantEdit() || n._showButtons(), n._removeState("busy") }, { blockPush: o.blockPush })
                                    })
                                }
                            }
                        }, {
                            key: "_loadCanvas",
                            value: function(t, e, i, n) {
                                var o = this;
                                if (n || (n = {}), !this._isBeingDestroyed) {
                                    this._data.input.image = t, this._data.input.width = t.width, this._data.input.height = t.height, this._initialRotation && (this._data.actions.rotation = this._initialRotation, this._initialRotation = null);
                                    var a = this._data.actions.rotation % 180 !== 0;
                                    this._isFixedRatio() || (this._initialCrop ? this._ratio = this._initialCrop.height / this._initialCrop.width : this._ratio = a ? t.width / t.height : t.height / t.width, this._scaleDropArea(this._ratio));
                                    var r = function() {
                                        o._options.size && (o._data.actions.size = { width: o._options.size.width, height: o._options.size.height }), o._applyTransforms(t, function(t) {
                                            var a = o._getIntro(),
                                                r = a.offsetWidth / t.width,
                                                s = !1;
                                            o._options.service && o._options.push && !n.blockPush && (o._hasInitialImage || o._canInstantEdit() || (s = !0, o._stopProgressLoop(function() { o._startProgress(function() { o._updateProgress(.1) }) }))), o._canInstantEdit() || o._save(function() { o._isBeingDestroyed || s && (o._stopProgress(), i()) }, s);
                                            var h = "auto" === o._options.devicePixelRatio ? window.devicePixelRatio : o._options.devicePixelRatio;
                                            a.src = "", a.src = ht(t, r * h).toDataURL(), a.onload = function() { a.onload = null, o._isBeingDestroyed || e && e(s) }
                                        })
                                    };
                                    this._initialCrop ? (this._data.actions.crop = mt(this._initialCrop), this._data.actions.crop.type = At.INITIAL, this._initialCrop = null, r()) : this._options.willCropInitial.apply(this, [this.data, function(e) { e ? (o._data.actions.crop = e, o._data.actions.crop.type = At.INITIAL) : (o._data.actions.crop = tt(a ? t.height : t.width, a ? t.width : t.height, o._ratio), o._data.actions.crop.type = At.AUTO), r() }, this])
                                }
                            }
                        }, {
                            key: "_applyTransforms",
                            value: function(t, e) {
                                var i = this,
                                    n = mt(this._data.actions);
                                n.filters = { sharpen: this._options.filterSharpen / 100 }, this._options.forceMinSize ? n.minSize = this._options.minSize : n.minSize = { width: 0, height: 0 }, et(t, n, function(t) {
                                    var n = t;
                                    if (i._options.forceSize || i._options.size && 1 == rt(i._options.size, t)) {
                                        n = k("canvas"), n.width = i._options.size.width, n.height = i._options.size.height;
                                        var o = n.getContext("2d");
                                        o.drawImage(t, 0, 0, i._options.size.width, i._options.size.height)
                                    }
                                    if (i._options.forceMinSize && i._options.size && i._options.minSize.width === i._options.size.width && i._options.minSize.height === i._options.size.height && (n.width < i._options.minSize.width || n.height < i._options.minSize.height)) {
                                        var a = Math.max(n.width, i._options.minSize.width),
                                            r = Math.max(n.height, i._options.minSize.height);
                                        n = k("canvas"), n.width = a, n.height = r;
                                        var s = n.getContext("2d");
                                        s.drawImage(t, 0, 0, a, r)
                                    }
                                    if (i._options.forceMinSize && 1 === i._ratio && (n.width < i._options.minSize.width || n.height < i._options.minSize.height)) {
                                        n = k("canvas"), n.width = i._options.minSize.width, n.height = i._options.minSize.height;
                                        var h = n.getContext("2d");
                                        h.drawImage(t, 0, 0, n.width, n.height)
                                    }
                                    i._data.output.width = n.width, i._data.output.height = n.height, i._data.output.image = n, i._onTransformCanvas(function(t) { i._data = t, i._options.didTransform.apply(i, [i.data, i]), e(i._data.output.image) })
                                })
                            }
                        }, { key: "_onTransformCanvas", value: function(t) { this._options.willTransform.apply(this, [this.data, t, this]) } }, {
                            key: "_appendEditor",
                            value: function() {
                                var t = this;
                                this._imageEditor || (this._imageEditor = new It(k("div"), { minSize: this._options.minSize, devicePixelRatio: this._options.devicePixelRatio, buttonConfirmClassName: this._options.buttonConfirmClassName, buttonCancelClassName: this._options.buttonCancelClassName, buttonRotateClassName: this._options.buttonRotateClassName, buttonConfirmLabel: this._options.buttonConfirmLabel, buttonCancelLabel: this._options.buttonCancelLabel, buttonRotateLabel: this._options.buttonRotateLabel, buttonConfirmTitle: this._options.buttonConfirmTitle, buttonCancelTitle: this._options.buttonCancelTitle, buttonRotateTitle: this._options.buttonRotateTitle }), Nt.forEach(function(e) { t._imageEditor.element.addEventListener(e, t) }))
                            }
                        }, {
                            key: "_scaleDropArea",
                            value: function(t) {
                                var e = this._getRatioSpacerElement();
                                e && this._element && (e.style.marginBottom = 100 * t + "%", this._element.setAttribute("data-ratio", "1:" + t))
                            }
                        }, { key: "_onCancel", value: function(t) { this._removeState("editor"), this._options.didCancel.apply(this, [this]), this._showButtons(), this._hideEditor(), this._options.instantEdit && !this._hasInitialImage && this._isAutoCrop() && this._doRemove() } }, {
                            key: "_onConfirm",
                            value: function(t) {
                                var e = this,
                                    i = this._options.service && this._options.push;
                                i ? this._startProgress(function() { e._updateProgress(.1) }) : this._startProgressLoop(), this._removeState("editor"), this._addState("busy"), this._output.value = "", this._data.actions.rotation = t.detail.rotation, this._data.actions.crop = t.detail.crop, this._data.actions.crop.type = At.MANUAL, this._applyTransforms(this._data.input.image, function(t) {
                                    e._options.didConfirm.apply(e, [e.data, e]);
                                    var n = e._getInOut(),
                                        o = "out" === n[0].className ? n[0] : n[1],
                                        a = o === n[0] ? n[1] : n[0];
                                    o.className = "in", o.style.opacity = "0", o.style.zIndex = "2", a.className = "out", a.style.zIndex = "1";
                                    var r = "auto" === e._options.devicePixelRatio ? window.devicePixelRatio : e._options.devicePixelRatio;
                                    o.src = "", o.src = ht(t, o.offsetWidth / t.width * r).toDataURL(), o.onload = function() {
                                        o.onload = null, "free" === e._options.ratio && (e._ratio = o.naturalHeight / o.naturalWidth, e._scaleDropArea(e._ratio)), e._hideEditor();
                                        var t = setTimeout(function() { e._showPreview(o, function() { e._save(function(t, n, o) { e._toggleButton("upload", !0), i ? e._stopProgress() : e._stopProgressLoop(), e._removeState("busy"), e._showButtons() }, i) }) }, 250);
                                        e._timers.push(t)
                                    }
                                })
                            }
                        }, {
                            key: "_cropAuto",
                            value: function() {
                                var t = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function(t) {},
                                    i = this._data.actions.rotation % 180 !== 0,
                                    n = tt(i ? this._data.input.image.height : this._data.input.image.width, i ? this._data.input.image.width : this._data.input.image.height, this._ratio);
                                this._crop(n.x, n.y, n.width, n.height, t, At.AUTO)
                            }
                        }, {
                            key: "_crop",
                            value: function(t, i, n, o) {
                                var a = arguments.length > 4 && arguments[4] !== e ? arguments[4] : function(t) {},
                                    r = arguments.length > 5 && arguments[5] !== e ? arguments[5] : At.MANUAL;
                                this._output.value = "", this._data.actions.crop = { x: t, y: i, width: n, height: o }, this._data.actions.crop.type = r, this._manualTransform(a)
                            }
                        }, {
                            key: "_manualTransform",
                            value: function(t) {
                                var e = this;
                                this._startProgressLoop(), this._addState("busy"), this._applyTransforms(this._data.input.image, function(i) {
                                    var n = e._getInOut(),
                                        o = "out" === n[0].className ? n[0] : n[1],
                                        a = o === n[0] ? n[1] : n[0];
                                    o.className = "in", o.style.opacity = "1", o.style.zIndex = "2", a.className = "out", a.style.zIndex = "0";
                                    var r = "auto" === e._options.devicePixelRatio ? window.devicePixelRatio : e._options.devicePixelRatio;
                                    o.src = "", o.src = ht(i, o.offsetWidth / i.width * r).toDataURL(), o.onload = function() {
                                        o.onload = null, "free" === e._options.ratio && (e._ratio = o.naturalHeight / o.naturalWidth, e._scaleDropArea(e._ratio));
                                        var i = e._options.service && e._options.push,
                                            n = function() { e._save(function(n, o, a) { i || e._stopProgressLoop(), e._removeState("busy"), t.apply(e, [e.data]) }, i) };
                                        i ? e._startProgress(n) : n()
                                    }
                                })
                            }
                        }, {
                            key: "_save",
                            value: function() {
                                var t = this,
                                    i = arguments.length > 0 && arguments[0] !== e ? arguments[0] : function() {},
                                    n = !(arguments.length > 1 && arguments[1] !== e) || arguments[1];
                                if (!this._isBeingDestroyed) {
                                    var o = this.dataBase64;
                                    this._options.service || this._isInitialising && !this._isImageOnly() || this._options.willSave.apply(this, [o, function(e) { t._store(e), t._options.didSave.apply(t, [e, t]) }, this]), this._isBeingDestroyed || (this._options.service && n && this._options.willSave.apply(this, [o, function(e) { t._addState("upload"), t._imageHopper && t._options.dropReplace && (t._imageHopper.enabled = !1), t._upload(e, function(n, o) { t._imageHopper && t._options.dropReplace && (t._imageHopper.enabled = !0), n || t._storeServerResponse(o), t._options.didUpload.apply(t, [n, e, o, t]), t._removeState("upload"), i(n, e, o) }) }, this]), this._options.service && n || i())
                                }
                            }
                        }, { key: "_storeServerResponse", value: function(t) { this._isRequired && (this._input.required = !1), this._data.server = t, this._output.value = "object" === ("undefined" == typeof t ? "undefined" : c(t)) ? JSON.stringify(this._data.server) : t } }, { key: "_store", value: function(t) { this._isRequired && (this._input.required = !1), this._output.value = JSON.stringify(t) } }, {
                            key: "_upload",
                            value: function(t, e) {
                                var i = this;
                                this.requestOutput(function(t, n) {
                                    var o = i._element.querySelector(".slim-upload-status"),
                                        a = i._options.willRequest,
                                        r = function(t, e) { i._updateProgress(Math.max(.1, t / e)) },
                                        s = function(t) {
                                            var n = setTimeout(function() {
                                                if (!i._isBeingDestroyed) {
                                                    o.innerHTML = i._options.statusUploadSuccess, o.setAttribute("data-state", "success"), o.style.opacity = 1;
                                                    var t = setTimeout(function() { o.style.opacity = 0 }, 2e3);
                                                    i._timers.push(t)
                                                }
                                            }, 250);
                                            i._timers.push(n), e(null, t)
                                        },
                                        h = function(t) {
                                            var n = "";
                                            n = "file-too-big" === t ? i._options.statusContentLength : i._options.didReceiveServerError.apply(i, [t, i._options.statusUnknownResponse, i]);
                                            var a = setTimeout(function() { o.innerHTML = n, o.setAttribute("data-state", "error"), o.style.opacity = 1 }, 250);
                                            i._timers.push(a), e(t)
                                        };
                                    "string" == typeof i._options.service ? O(i._options.service, i._options.uploadMethod, n, a, r, s, h) : "function" == typeof i._options.service && i._options.service.apply(i, ["file" === i._options.serviceFormat ? t : n, r, s, h, i])
                                }, t)
                            }
                        }, {
                            key: "requestOutput",
                            value: function(t, e) {
                                var i = this;
                                return this._data.input.file ? (e || (e = this.dataBase64), void n.parseMetaData(this._data.input.file, function(o) {
                                    var a = [],
                                        r = new FormData;
                                    if (L("input", i._options.post) && (a.push(i._data.input.file), r.append(i._inputReference, i._data.input.file, i._data.input.file.name)), L("output", i._options.post) && null !== i._data.output.image && i._options.uploadBase64 === !1) {
                                        var s = Z(e.output.image, e.output.name);
                                        if (o.imageHead && i._options.copyImageHead) try { s = new Blob([o.imageHead, n.blobSlice.call(s, 20)], { type: wt(e.output.image) }), s = G(s, e.output.name) } catch (h) {}
                                        a.push(s);
                                        var u = "slim_output_" + i._uid;
                                        e.output.image = null, e.output.field = u, r.append(u, s, e.output.name)
                                    }
                                    r.append(i._output.name, JSON.stringify(e)), t(a, r)
                                }, { maxMetaDataSize: 262144, disableImageHead: !1 })) : void t(null, null)
                            }
                        }, { key: "_showEditor", value: function() { Ft.className = this._options.popoverClassName, Ft.show(), this._imageEditor.show() } }, {
                            key: "_hideEditor",
                            value: function() {
                                this._imageEditor.hide();
                                var t = setTimeout(function() { Ft.hide() }, 250);
                                this._timers.push(t)
                            }
                        }, { key: "_showPreview", value: function(t, e) { u(t, { fromPosition: [0, 50, 0], position: [0, 0, 0], fromScale: [1.5, 1.5], scale: [1, 1], fromOpacity: 0, opacity: 1, easing: "spring", springConstant: .3, springDeceleration: .7, complete: function() { z(t), e && e() } }) } }, {
                            key: "_hideResult",
                            value: function(t) {
                                var e = this._getIntro();
                                e && u(e, { fromScale: [1, 1], scale: [.5, .5], fromOpacity: 1, opacity: 0, easing: "spring", springConstant: .3, springDeceleration: .75, complete: function() { z(e), t && t() } })
                            }
                        }, {
                            key: "_showButtons",
                            value: function(t) {
                                if (this._btnGroup) {
                                    this._btnGroup.style.display = "";
                                    var e = { fromScale: [.5, .5], scale: [1, 1], fromPosition: [0, 10, 0], position: [0, 0, 0], fromOpacity: 0, opacity: 1, complete: function() { z(this) }, allDone: function() { t && t() } };
                                    this.isDetached() ? e.duration = 1 : (e.delay = function(t) { return 250 + 50 * t }, e.easing = "spring", e.springConstant = .3, e.springDeceleration = .85), u(this._btnGroup.childNodes, e)
                                }
                            }
                        }, {
                            key: "_hideButtons",
                            value: function(t) {
                                var e = this;
                                if (this._btnGroup) {
                                    var i = { fromScale: [1, 1], scale: [.85, .85], fromOpacity: 1, opacity: 0, allDone: function() { e._btnGroup.style.display = "none", t && t() } };
                                    this.isDetached() ? i.duration = 1 : (i.easing = "spring", i.springConstant = .3, i.springDeceleration = .75), u(this._btnGroup.childNodes, i)
                                }
                            }
                        }, {
                            key: "_hideStatus",
                            value: function() {
                                var t = this._element.querySelector(".slim-upload-status");
                                t.style.opacity = 0
                            }
                        }, {
                            key: "_doEdit",
                            value: function() {
                                var t = this;
                                this._data.input.image && (this._addState("editor"), this._imageEditor || this._appendEditor(), this._imageEditor.showRotateButton = this._options.rotateButton, Ft.inner = this._imageEditor.element, this._imageEditor.open(st(this._data.input.image), "free" === this._options.ratio ? null : this._ratio, this._data.actions.crop, this._data.actions.rotation, function() { t._showEditor(), t._hideButtons(), t._hideStatus() }))
                            }
                        }, {
                            key: "_doRemove",
                            value: function(t) {
                                var e = this;
                                if (!this._isImageOnly()) {
                                    this._clearState(), this._addState("empty"), this._hasInitialImage = !1, this._imageHopper && (this._imageHopper.enabled = !0), this._isRequired && (this._input.required = !0);
                                    var i = this._getOutro();
                                    i && (i.style.opacity = "0");
                                    var n = this.data;
                                    this._resetData();
                                    var o = setTimeout(function() { e._isBeingDestroyed || (e._hideButtons(function() { e._toggleButton("upload", !0) }), e._hideStatus(), e._hideResult(), e._options.didRemove.apply(e, [n, e]), t && t()) }, this.isDetached() ? 0 : 250);
                                    return this._timers.push(o), n
                                }
                            }
                        }, {
                            key: "_doUpload",
                            value: function(t) {
                                var e = this;
                                this._data.input.image && (this._addState("upload"), this._startProgress(), this._hideButtons(function() { e._toggleButton("upload", !1), e._save(function(i, n, o) { e._removeState("upload"), e._stopProgress(), t && t.apply(e, [i, n, o]), i && e._toggleButton("upload", !0), e._showButtons() }) }))
                            }
                        }, {
                            key: "_doDownload",
                            value: function() {
                                var t = this._data.output.image;
                                t && kt(this._data, this._options.jpegCompression, this._options.forceType)
                            }
                        }, {
                            key: "_doDestroy",
                            value: function() {
                                function t(t, e) { return 0 !== e.filter(function(e) { return t.name === e.name && t.value === e.value }).length }
                                var e = this;
                                this._isBeingDestroyed = !0, this._timers.forEach(function(t) { clearTimeout(t) }), this._timers = [], u(this._element, "detach"), this._imageHopper && (Ht.forEach(function(t) { e._imageHopper.element.removeEventListener(t, e) }), this._imageHopper.destroy(), this._imageHopper = null), this._imageEditor && (Nt.forEach(function(t) { e._imageEditor.element.removeEventListener(t, e) }), this._imageEditor.destroy(), this._imageEditor = null), St(this._btnGroup.children).forEach(function(t) { t.removeEventListener("click", e) }), this._input.removeEventListener("change", this), this._element !== this._originalElement && this._element.parentNode && this._element.parentNode.replaceChild(this._originalElement, this._element), this._originalElement.innerHTML = this._originalElementInner;
                                var i = _(this._originalElement);
                                i.forEach(function(i) { t(i, e._originalElementAttributes) || e._originalElement.removeAttribute(i.name) }), this._originalElementAttributes.forEach(function(n) { t(n, i) || e._originalElement.setAttribute(n.name, n.value) }), Wt = Math.max(0, Wt - 1), Ft && 0 === Wt && (Ft.destroy(), Ft = null), this._originalElement = null, this._element = null, this._input = null, this._output = null, this._btnGroup = null, this._options = null
                            }
                        }, { key: "dataBase64", get: function() { return bt(this._data, this._options.post, this._options.jpegCompression, this._options.forceType, null !== this._options.service) } }, { key: "data", get: function() { return vt(this._data) } }, { key: "element", get: function() { return this._element } }, { key: "service", set: function(t) { this._options.service = t } }, { key: "size", set: function(t) { this.setSize(t, null) } }, { key: "rotation", set: function(t) { this.setRotation(t, null) } }, { key: "forceSize", set: function(t) { this.setForceSize(t, null) } }, { key: "ratio", set: function(t) { this.setRatio(t, null) } }], [{
                            key: "options",
                            value: function() {
                                var t = { edit: !0, instantEdit: !1, uploadBase64: !1, meta: {}, ratio: "free", devicePixelRatio: 1, size: null, rotation: null, crop: null, post: ["output", "actions"], service: null, serviceFormat: null, filterSharpen: 0, push: !1, defaultInputName: "slim[]", minSize: { width: 0, height: 0 }, maxFileSize: null, jpegCompression: null, uploadMethod: "POST", download: !1, saveInitialImage: !1, forceType: !1, forceSize: null, forceMinSize: !0, dropReplace: !0, fetcher: null, internalCanvasSize: { width: 4096, height: 4096 }, copyImageHead: !1, rotateButton: !0, popoverClassName: null, label: "<p>Drop your image here</p>", labelLoading: "<p>Loading image...</p>", statusFileType: "<p>Invalid file type, expects: $0.</p>", statusFileSize: "<p>File is too big, maximum file size: $0 MB.</p>", statusNoSupport: "<p>Your browser does not support image cropping.</p>", statusImageTooSmall: "<p>Image is too small, minimum size is: $0 pixels.</p>", statusContentLength: '<span class="slim-upload-status-icon"></span> The file is probably too big', statusUnknownResponse: '<span class="slim-upload-status-icon"></span> An unknown error occurred', statusUploadSuccess: '<span class="slim-upload-status-icon"></span> Yüklendi', statusLocalUrlProblem: null, didInit: function(t) {}, didLoad: function(t, e, i) { return !0 }, didSave: function(t) {}, didUpload: function(t, e, i) {}, didReceiveServerError: function(t, e) { return e }, didRemove: function(t) {}, didTransform: function(t) {}, didConfirm: function(t) {}, didCancel: function() {}, didThrowError: function() {}, willCropInitial: function(t, e) { e(null) }, willTransform: function(t, e) { e(t) }, willSave: function(t, e) { e(t) }, willRemove: function(t, e) { e() }, willRequest: function(t, e) {}, willFetch: function(t) {}, willLoad: function(t) {} };
                                return Bt.concat(It.Buttons).concat("rotate").forEach(function(e) {
                                    var i = R(e);
                                    t["button" + i + "ClassName"] = null, t["button" + i + "Label"] = i, t["button" + i + "Title"] = i
                                }), t
                            }
                        }]), i
                    }();
                return function() {
                    function t(t) { return t ? "<p>" + t + "</p>" : null }

                    function e(t) {
                        var e = window,
                            i = t.split(".");
                        return i.forEach(function(t, n) { e[i[n]] && (e = e[i[n]]) }), e !== window ? e : null
                    }
                    var i = [],
                        n = function(t) {
                            for (var e = 0, n = i.length; e < n; e++)
                                if (i[e].isAttachedTo(t)) return e;
                            return -1
                        },
                        o = function(t) { return t },
                        a = function(t) { return "true" === t },
                        r = function(t) { return !t || "true" === t },
                        s = function(e) { return t(e) },
                        h = function(t) { return t ? e(t) : null },
                        u = function(t) {
                            if (!t) return null;
                            var e = zt(t, ",");
                            return {
                                width: e[0],
                                height: e[1]
                            }
                        },
                        l = function(t) { return t ? parseFloat(t) : null },
                        p = function(t) { return t ? parseInt(t, 10) : null },
                        c = function(t) { if (!t) return null; var e = {}; return t.split(",").map(function(t) { return parseInt(t, 10) }).forEach(function(t, i) { e[Ut[i]] = t }), e },
                        f = { download: a, edit: r, instantEdit: a, minSize: u, size: u, forceSize: u, forceMinSize: r, internalCanvasSize: u, service: function(t) { if ("undefined" == typeof t) return null; var i = e(t); return i ? i : t }, serviceFormat: function(t) { return "undefined" == typeof t ? null : t }, fetcher: function(t) { return "undefined" == typeof t ? null : t }, push: a, rotation: function(t) { return "undefined" == typeof t ? null : parseInt(t, 10) }, crop: c, post: function(t) { return t ? t.split(",").map(function(t) { return t.trim() }) : null }, defaultInputName: o, ratio: function(t) { return t ? t : null }, maxFileSize: l, filterSharpen: p, jpegCompression: p, uploadBase64: a, forceType: o, dropReplace: r, saveInitialImage: a, copyImageHead: a, rotateButton: r, label: s, labelLoading: s, popoverClassName: o, devicePixelRatio: o, uploadMethod: o };
                    ["FileSize", "FileType", "NoSupport", "ImageTooSmall"].forEach(function(t) { f["status" + t] = s }), ["ContentLength", "UnknownResponse", "UploadSuccess", "localUrlProblem"].forEach(function(t) { f["status" + t] = o }), ["Init", "Load", "Save", "Upload", "Remove", "Transform", "ReceiveServerError", "Confirm", "Cancel", "ThrowError"].forEach(function(t) { f["did" + t] = h }), ["CropInitial", "Transform", "Save", "Remove", "Request", "Load", "Fetch"].forEach(function(t) { f["will" + t] = h });
                    var _ = ["ClassName", "Label", "Title"];
                    Bt.concat(It.Buttons).concat("rotate").forEach(function(t) {
                        var e = R(t);
                        _.forEach(function(t) { f["button" + e + t] = o })
                    }), Gt.supported = function() { return !("[object OperaMini]" === Object.prototype.toString.call(window.operamini) || "undefined" == typeof window.addEventListener || "undefined" == typeof window.FileReader || !("slice" in Blob.prototype) || "undefined" == typeof window.URL || "undefined" == typeof window.URL.createObjectURL) }(), Gt.parse = function(t) { var e, i, n, o = []; for (e = t.querySelectorAll(".slim:not([data-state])"), n = e.length; n--;) i = e[n], o.push(Gt.create(i, Gt.getOptionsFromAttributes(i))); return o }, Gt.getOptionsFromAttributes = function(t) {
                        var e = d(t),
                            i = { meta: {} };
                        for (var n in e) {
                            var o = f[n],
                                a = e[n];
                            o ? (a = o(a), a = null === a ? mt(Gt.options()[n]) : a, i[n] = a) : 0 === n.indexOf("meta") && (i.meta[M(n.substr(4))] = a)
                        }
                        return i
                    }, Gt.find = function(t) { var e = i.filter(function(e) { return e.isAttachedTo(t) }); return e ? e[0] : null }, Gt.create = function(t, e) { if (!Gt.find(t)) { e || (e = Gt.getOptionsFromAttributes(t)); var n = new Gt(t, e); return i.push(n), n } }, Gt.destroy = function(t) { var e = n(t); return !(e < 0) && (i[e].destroy(), i.splice(e, 1), !0) }
                }(), Gt
            }(), t.Slim.supported) "loading" !== document.readyState ? i() : document.addEventListener("DOMContentLoaded", i);
        else {
            var n = t.getElementsByClassName("slim"),
                o = 0,
                a = n.length;
            for (o = 0; o < a; o++) n[o].className = ""
        }
}(window);