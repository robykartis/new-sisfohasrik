!(function (t, e) {
    "object" == typeof exports && "object" == typeof module
        ? (module.exports = e())
        : "function" == typeof define && define.amd
        ? define([], e)
        : "object" == typeof exports
        ? (exports.Scrollbar = e())
        : (t.Scrollbar = e());
})(this, function () {
    return (function (t) {
        var e = {};
        function n(r) {
            if (e[r]) return e[r].exports;
            var o = (e[r] = { i: r, l: !1, exports: {} });
            return t[r].call(o.exports, o, o.exports, n), (o.l = !0), o.exports;
        }
        return (
            (n.m = t),
            (n.c = e),
            (n.d = function (t, e, r) {
                n.o(t, e) ||
                    Object.defineProperty(t, e, { enumerable: !0, get: r });
            }),
            (n.r = function (t) {
                "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(t, Symbol.toStringTag, {
                        value: "Module",
                    }),
                    Object.defineProperty(t, "__esModule", { value: !0 });
            }),
            (n.t = function (t, e) {
                if ((1 & e && (t = n(t)), 8 & e)) return t;
                if (4 & e && "object" == typeof t && t && t.__esModule)
                    return t;
                var r = Object.create(null);
                if (
                    (n.r(r),
                    Object.defineProperty(r, "default", {
                        enumerable: !0,
                        value: t,
                    }),
                    2 & e && "string" != typeof t)
                )
                    for (var o in t)
                        n.d(
                            r,
                            o,
                            function (e) {
                                return t[e];
                            }.bind(null, o)
                        );
                return r;
            }),
            (n.n = function (t) {
                var e =
                    t && t.__esModule
                        ? function () {
                              return t.default;
                          }
                        : function () {
                              return t;
                          };
                return n.d(e, "a", e), e;
            }),
            (n.o = function (t, e) {
                return Object.prototype.hasOwnProperty.call(t, e);
            }),
            (n.p = ""),
            n((n.s = 67))
        );
    })([
        function (t, e, n) {
            (function (e) {
                var n = function (t) {
                    return t && t.Math == Math && t;
                };
                t.exports =
                    n("object" == typeof globalThis && globalThis) ||
                    n("object" == typeof window && window) ||
                    n("object" == typeof self && self) ||
                    n("object" == typeof e && e) ||
                    Function("return this")();
            }.call(this, n(43)));
        },
        function (t, e, n) {
            var r = n(0),
                o = n(51),
                i = n(3),
                u = n(29),
                c = n(56),
                a = n(76),
                s = o("wks"),
                f = r.Symbol,
                l = a ? f : (f && f.withoutSetter) || u;
            t.exports = function (t) {
                return (
                    i(s, t) ||
                        (c && i(f, t)
                            ? (s[t] = f[t])
                            : (s[t] = l("Symbol." + t))),
                    s[t]
                );
            };
        },
        function (t, e) {
            t.exports = function (t) {
                return "object" == typeof t
                    ? null !== t
                    : "function" == typeof t;
            };
        },
        function (t, e) {
            var n = {}.hasOwnProperty;
            t.exports = function (t, e) {
                return n.call(t, e);
            };
        },
        function (t, e) {
            t.exports = function (t) {
                try {
                    return !!t();
                } catch (t) {
                    return !0;
                }
            };
        },
        function (t, e, n) {
            var r = n(6),
                o = n(46),
                i = n(7),
                u = n(25),
                c = Object.defineProperty;
            e.f = r
                ? c
                : function (t, e, n) {
                      if ((i(t), (e = u(e, !0)), i(n), o))
                          try {
                              return c(t, e, n);
                          } catch (t) {}
                      if ("get" in n || "set" in n)
                          throw TypeError("Accessors not supported");
                      return "value" in n && (t[e] = n.value), t;
                  };
        },
        function (t, e, n) {
            var r = n(4);
            t.exports = !r(function () {
                return (
                    7 !=
                    Object.defineProperty({}, 1, {
                        get: function () {
                            return 7;
                        },
                    })[1]
                );
            });
        },
        function (t, e, n) {
            var r = n(2);
            t.exports = function (t) {
                if (!r(t)) throw TypeError(String(t) + " is not an object");
                return t;
            };
        },
        function (t, e, n) {
            var r = n(6),
                o = n(5),
                i = n(14);
            t.exports = r
                ? function (t, e, n) {
                      return o.f(t, e, i(1, n));
                  }
                : function (t, e, n) {
                      return (t[e] = n), t;
                  };
        },
        function (t, e, n) {
            var r,
                o,
                i,
                u = n(50),
                c = n(0),
                a = n(2),
                s = n(8),
                f = n(3),
                l = n(27),
                p = n(16),
                h = c.WeakMap;
            if (u) {
                var d = new h(),
                    v = d.get,
                    y = d.has,
                    m = d.set;
                (r = function (t, e) {
                    return m.call(d, t, e), e;
                }),
                    (o = function (t) {
                        return v.call(d, t) || {};
                    }),
                    (i = function (t) {
                        return y.call(d, t);
                    });
            } else {
                var g = l("state");
                (p[g] = !0),
                    (r = function (t, e) {
                        return s(t, g, e), e;
                    }),
                    (o = function (t) {
                        return f(t, g) ? t[g] : {};
                    }),
                    (i = function (t) {
                        return f(t, g);
                    });
            }
            t.exports = {
                set: r,
                get: o,
                has: i,
                enforce: function (t) {
                    return i(t) ? o(t) : r(t, {});
                },
                getterFor: function (t) {
                    return function (e) {
                        var n;
                        if (!a(e) || (n = o(e)).type !== t)
                            throw TypeError(
                                "Incompatible receiver, " + t + " required"
                            );
                        return n;
                    };
                },
            };
        },
        function (t, e, n) {
            var r = n(0);
            t.exports = r;
        },
        function (t, e, n) {
            var r = n(0),
                o = n(8),
                i = n(3),
                u = n(26),
                c = n(48),
                a = n(9),
                s = a.get,
                f = a.enforce,
                l = String(String).split("String");
            (t.exports = function (t, e, n, c) {
                var a = !!c && !!c.unsafe,
                    s = !!c && !!c.enumerable,
                    p = !!c && !!c.noTargetGet;
                "function" == typeof n &&
                    ("string" != typeof e || i(n, "name") || o(n, "name", e),
                    (f(n).source = l.join("string" == typeof e ? e : ""))),
                    t !== r
                        ? (a ? !p && t[e] && (s = !0) : delete t[e],
                          s ? (t[e] = n) : o(t, e, n))
                        : s
                        ? (t[e] = n)
                        : u(e, n);
            })(Function.prototype, "toString", function () {
                return ("function" == typeof this && s(this).source) || c(this);
            });
        },
        function (t, e) {
            t.exports = {};
        },
        function (t, e, n) {
            var r = n(0),
                o = n(44).f,
                i = n(8),
                u = n(11),
                c = n(26),
                a = n(70),
                s = n(54);
            t.exports = function (t, e) {
                var n,
                    f,
                    l,
                    p,
                    h,
                    d = t.target,
                    v = t.global,
                    y = t.stat;
                if ((n = v ? r : y ? r[d] || c(d, {}) : (r[d] || {}).prototype))
                    for (f in e) {
                        if (
                            ((p = e[f]),
                            (l = t.noTargetGet
                                ? (h = o(n, f)) && h.value
                                : n[f]),
                            !s(v ? f : d + (y ? "." : "#") + f, t.forced) &&
                                void 0 !== l)
                        ) {
                            if (typeof p == typeof l) continue;
                            a(p, l);
                        }
                        (t.sham || (l && l.sham)) && i(p, "sham", !0),
                            u(n, f, p, t);
                    }
            };
        },
        function (t, e) {
            t.exports = function (t, e) {
                return {
                    enumerable: !(1 & t),
                    configurable: !(2 & t),
                    writable: !(4 & t),
                    value: e,
                };
            };
        },
        function (t, e, n) {
            var r = n(22),
                o = n(24);
            t.exports = function (t) {
                return r(o(t));
            };
        },
        function (t, e) {
            t.exports = {};
        },
        function (t, e, n) {
            var r = n(31),
                o = Math.min;
            t.exports = function (t) {
                return t > 0 ? o(r(t), 9007199254740991) : 0;
            };
        },
        function (t, e, n) {
            var r = n(16),
                o = n(2),
                i = n(3),
                u = n(5).f,
                c = n(29),
                a = n(75),
                s = c("meta"),
                f = 0,
                l =
                    Object.isExtensible ||
                    function () {
                        return !0;
                    },
                p = function (t) {
                    u(t, s, { value: { objectID: "O" + ++f, weakData: {} } });
                },
                h = (t.exports = {
                    REQUIRED: !1,
                    fastKey: function (t, e) {
                        if (!o(t))
                            return "symbol" == typeof t
                                ? t
                                : ("string" == typeof t ? "S" : "P") + t;
                        if (!i(t, s)) {
                            if (!l(t)) return "F";
                            if (!e) return "E";
                            p(t);
                        }
                        return t[s].objectID;
                    },
                    getWeakData: function (t, e) {
                        if (!i(t, s)) {
                            if (!l(t)) return !0;
                            if (!e) return !1;
                            p(t);
                        }
                        return t[s].weakData;
                    },
                    onFreeze: function (t) {
                        return a && h.REQUIRED && l(t) && !i(t, s) && p(t), t;
                    },
                });
            r[s] = !0;
        },
        function (t, e, n) {
            var r = n(77);
            t.exports = function (t, e, n) {
                if ((r(t), void 0 === e)) return t;
                switch (n) {
                    case 0:
                        return function () {
                            return t.call(e);
                        };
                    case 1:
                        return function (n) {
                            return t.call(e, n);
                        };
                    case 2:
                        return function (n, r) {
                            return t.call(e, n, r);
                        };
                    case 3:
                        return function (n, r, o) {
                            return t.call(e, n, r, o);
                        };
                }
                return function () {
                    return t.apply(e, arguments);
                };
            };
        },
        function (t, e, n) {
            var r = n(24);
            t.exports = function (t) {
                return Object(r(t));
            };
        },
        function (t, e, n) {
            "use strict";
            var r = n(13),
                o = n(0),
                i = n(54),
                u = n(11),
                c = n(18),
                a = n(33),
                s = n(35),
                f = n(2),
                l = n(4),
                p = n(60),
                h = n(36),
                d = n(78);
            t.exports = function (t, e, n) {
                var v = -1 !== t.indexOf("Map"),
                    y = -1 !== t.indexOf("Weak"),
                    m = v ? "set" : "add",
                    g = o[t],
                    b = g && g.prototype,
                    x = g,
                    w = {},
                    S = function (t) {
                        var e = b[t];
                        u(
                            b,
                            t,
                            "add" == t
                                ? function (t) {
                                      return (
                                          e.call(this, 0 === t ? 0 : t), this
                                      );
                                  }
                                : "delete" == t
                                ? function (t) {
                                      return (
                                          !(y && !f(t)) &&
                                          e.call(this, 0 === t ? 0 : t)
                                      );
                                  }
                                : "get" == t
                                ? function (t) {
                                      return y && !f(t)
                                          ? void 0
                                          : e.call(this, 0 === t ? 0 : t);
                                  }
                                : "has" == t
                                ? function (t) {
                                      return (
                                          !(y && !f(t)) &&
                                          e.call(this, 0 === t ? 0 : t)
                                      );
                                  }
                                : function (t, n) {
                                      return (
                                          e.call(this, 0 === t ? 0 : t, n), this
                                      );
                                  }
                        );
                    };
                if (
                    i(
                        t,
                        "function" != typeof g ||
                            !(
                                y ||
                                (b.forEach &&
                                    !l(function () {
                                        new g().entries().next();
                                    }))
                            )
                    )
                )
                    (x = n.getConstructor(e, t, v, m)), (c.REQUIRED = !0);
                else if (i(t, !0)) {
                    var O = new x(),
                        _ = O[m](y ? {} : -0, 1) != O,
                        E = l(function () {
                            O.has(1);
                        }),
                        T = p(function (t) {
                            new g(t);
                        }),
                        A =
                            !y &&
                            l(function () {
                                for (var t = new g(), e = 5; e--; ) t[m](e, e);
                                return !t.has(-0);
                            });
                    T ||
                        (((x = e(function (e, n) {
                            s(e, x, t);
                            var r = d(new g(), e, x);
                            return null != n && a(n, r[m], r, v), r;
                        })).prototype = b),
                        (b.constructor = x)),
                        (E || A) && (S("delete"), S("has"), v && S("get")),
                        (A || _) && S(m),
                        y && b.clear && delete b.clear;
                }
                return (
                    (w[t] = x),
                    r({ global: !0, forced: x != g }, w),
                    h(x, t),
                    y || n.setStrong(x, t, v),
                    x
                );
            };
        },
        function (t, e, n) {
            var r = n(4),
                o = n(23),
                i = "".split;
            t.exports = r(function () {
                return !Object("z").propertyIsEnumerable(0);
            })
                ? function (t) {
                      return "String" == o(t) ? i.call(t, "") : Object(t);
                  }
                : Object;
        },
        function (t, e) {
            var n = {}.toString;
            t.exports = function (t) {
                return n.call(t).slice(8, -1);
            };
        },
        function (t, e) {
            t.exports = function (t) {
                if (null == t) throw TypeError("Can't call method on " + t);
                return t;
            };
        },
        function (t, e, n) {
            var r = n(2);
            t.exports = function (t, e) {
                if (!r(t)) return t;
                var n, o;
                if (
                    e &&
                    "function" == typeof (n = t.toString) &&
                    !r((o = n.call(t)))
                )
                    return o;
                if ("function" == typeof (n = t.valueOf) && !r((o = n.call(t))))
                    return o;
                if (
                    !e &&
                    "function" == typeof (n = t.toString) &&
                    !r((o = n.call(t)))
                )
                    return o;
                throw TypeError("Can't convert object to primitive value");
            };
        },
        function (t, e, n) {
            var r = n(0),
                o = n(8);
            t.exports = function (t, e) {
                try {
                    o(r, t, e);
                } catch (n) {
                    r[t] = e;
                }
                return e;
            };
        },
        function (t, e, n) {
            var r = n(51),
                o = n(29),
                i = r("keys");
            t.exports = function (t) {
                return i[t] || (i[t] = o(t));
            };
        },
        function (t, e) {
            t.exports = !1;
        },
        function (t, e) {
            var n = 0,
                r = Math.random();
            t.exports = function (t) {
                return (
                    "Symbol(" +
                    String(void 0 === t ? "" : t) +
                    ")_" +
                    (++n + r).toString(36)
                );
            };
        },
        function (t, e, n) {
            var r = n(10),
                o = n(0),
                i = function (t) {
                    return "function" == typeof t ? t : void 0;
                };
            t.exports = function (t, e) {
                return arguments.length < 2
                    ? i(r[t]) || i(o[t])
                    : (r[t] && r[t][e]) || (o[t] && o[t][e]);
            };
        },
        function (t, e) {
            var n = Math.ceil,
                r = Math.floor;
            t.exports = function (t) {
                return isNaN((t = +t)) ? 0 : (t > 0 ? r : n)(t);
            };
        },
        function (t, e) {
            t.exports = [
                "constructor",
                "hasOwnProperty",
                "isPrototypeOf",
                "propertyIsEnumerable",
                "toLocaleString",
                "toString",
                "valueOf",
            ];
        },
        function (t, e, n) {
            var r = n(7),
                o = n(55),
                i = n(17),
                u = n(19),
                c = n(57),
                a = n(59),
                s = function (t, e) {
                    (this.stopped = t), (this.result = e);
                };
            (t.exports = function (t, e, n, f, l) {
                var p,
                    h,
                    d,
                    v,
                    y,
                    m,
                    g,
                    b = u(e, n, f ? 2 : 1);
                if (l) p = t;
                else {
                    if ("function" != typeof (h = c(t)))
                        throw TypeError("Target is not iterable");
                    if (o(h)) {
                        for (d = 0, v = i(t.length); v > d; d++)
                            if (
                                (y = f ? b(r((g = t[d]))[0], g[1]) : b(t[d])) &&
                                y instanceof s
                            )
                                return y;
                        return new s(!1);
                    }
                    p = h.call(t);
                }
                for (m = p.next; !(g = m.call(p)).done; )
                    if (
                        "object" == typeof (y = a(p, b, g.value, f)) &&
                        y &&
                        y instanceof s
                    )
                        return y;
                return new s(!1);
            }).stop = function (t) {
                return new s(!0, t);
            };
        },
        function (t, e, n) {
            var r = {};
            (r[n(1)("toStringTag")] = "z"),
                (t.exports = "[object z]" === String(r));
        },
        function (t, e) {
            t.exports = function (t, e, n) {
                if (!(t instanceof e))
                    throw TypeError(
                        "Incorrect " + (n ? n + " " : "") + "invocation"
                    );
                return t;
            };
        },
        function (t, e, n) {
            var r = n(5).f,
                o = n(3),
                i = n(1)("toStringTag");
            t.exports = function (t, e, n) {
                t &&
                    !o((t = n ? t : t.prototype), i) &&
                    r(t, i, { configurable: !0, value: e });
            };
        },
        function (t, e, n) {
            var r,
                o = n(7),
                i = n(80),
                u = n(32),
                c = n(16),
                a = n(81),
                s = n(47),
                f = n(27)("IE_PROTO"),
                l = function () {},
                p = function (t) {
                    return "<script>" + t + "</script>";
                },
                h = function () {
                    try {
                        r = document.domain && new ActiveXObject("htmlfile");
                    } catch (t) {}
                    h = r
                        ? (function (t) {
                              t.write(p("")), t.close();
                              var e = t.parentWindow.Object;
                              return (t = null), e;
                          })(r)
                        : (function () {
                              var t,
                                  e = s("iframe");
                              return (
                                  (e.style.display = "none"),
                                  a.appendChild(e),
                                  (e.src = String("javascript:")),
                                  (t = e.contentWindow.document).open(),
                                  t.write(p("document.F=Object")),
                                  t.close(),
                                  t.F
                              );
                          })();
                    for (var t = u.length; t--; ) delete h.prototype[u[t]];
                    return h();
                };
            (c[f] = !0),
                (t.exports =
                    Object.create ||
                    function (t, e) {
                        var n;
                        return (
                            null !== t
                                ? ((l.prototype = o(t)),
                                  (n = new l()),
                                  (l.prototype = null),
                                  (n[f] = t))
                                : (n = h()),
                            void 0 === e ? n : i(n, e)
                        );
                    });
        },
        function (t, e, n) {
            var r = n(11);
            t.exports = function (t, e, n) {
                for (var o in e) r(t, o, e[o], n);
                return t;
            };
        },
        function (t, e, n) {
            "use strict";
            var r = n(13),
                o = n(82),
                i = n(65),
                u = n(61),
                c = n(36),
                a = n(8),
                s = n(11),
                f = n(1),
                l = n(28),
                p = n(12),
                h = n(64),
                d = h.IteratorPrototype,
                v = h.BUGGY_SAFARI_ITERATORS,
                y = f("iterator"),
                m = function () {
                    return this;
                };
            t.exports = function (t, e, n, f, h, g, b) {
                o(n, e, f);
                var x,
                    w,
                    S,
                    O = function (t) {
                        if (t === h && j) return j;
                        if (!v && t in T) return T[t];
                        switch (t) {
                            case "keys":
                            case "values":
                            case "entries":
                                return function () {
                                    return new n(this, t);
                                };
                        }
                        return function () {
                            return new n(this);
                        };
                    },
                    _ = e + " Iterator",
                    E = !1,
                    T = t.prototype,
                    A = T[y] || T["@@iterator"] || (h && T[h]),
                    j = (!v && A) || O(h),
                    P = ("Array" == e && T.entries) || A;
                if (
                    (P &&
                        ((x = i(P.call(new t()))),
                        d !== Object.prototype &&
                            x.next &&
                            (l ||
                                i(x) === d ||
                                (u
                                    ? u(x, d)
                                    : "function" != typeof x[y] && a(x, y, m)),
                            c(x, _, !0, !0),
                            l && (p[_] = m))),
                    "values" == h &&
                        A &&
                        "values" !== A.name &&
                        ((E = !0),
                        (j = function () {
                            return A.call(this);
                        })),
                    (l && !b) || T[y] === j || a(T, y, j),
                    (p[e] = j),
                    h)
                )
                    if (
                        ((w = {
                            values: O("values"),
                            keys: g ? j : O("keys"),
                            entries: O("entries"),
                        }),
                        b)
                    )
                        for (S in w) (!v && !E && S in T) || s(T, S, w[S]);
                    else r({ target: e, proto: !0, forced: v || E }, w);
                return w;
            };
        },
        function (t, e, n) {
            var r = n(34),
                o = n(11),
                i = n(85);
            r || o(Object.prototype, "toString", i, { unsafe: !0 });
        },
        function (t, e, n) {
            "use strict";
            var r = n(86).charAt,
                o = n(9),
                i = n(39),
                u = o.set,
                c = o.getterFor("String Iterator");
            i(
                String,
                "String",
                function (t) {
                    u(this, {
                        type: "String Iterator",
                        string: String(t),
                        index: 0,
                    });
                },
                function () {
                    var t,
                        e = c(this),
                        n = e.string,
                        o = e.index;
                    return o >= n.length
                        ? { value: void 0, done: !0 }
                        : ((t = r(n, o)),
                          (e.index += t.length),
                          { value: t, done: !1 });
                }
            );
        },
        function (t, e, n) {
            var r = n(0),
                o = n(87),
                i = n(88),
                u = n(8),
                c = n(1),
                a = c("iterator"),
                s = c("toStringTag"),
                f = i.values;
            for (var l in o) {
                var p = r[l],
                    h = p && p.prototype;
                if (h) {
                    if (h[a] !== f)
                        try {
                            u(h, a, f);
                        } catch (t) {
                            h[a] = f;
                        }
                    if ((h[s] || u(h, s, l), o[l]))
                        for (var d in i)
                            if (h[d] !== i[d])
                                try {
                                    u(h, d, i[d]);
                                } catch (t) {
                                    h[d] = i[d];
                                }
                }
            }
        },
        function (t, e) {
            var n;
            n = (function () {
                return this;
            })();
            try {
                n = n || new Function("return this")();
            } catch (t) {
                "object" == typeof window && (n = window);
            }
            t.exports = n;
        },
        function (t, e, n) {
            var r = n(6),
                o = n(45),
                i = n(14),
                u = n(15),
                c = n(25),
                a = n(3),
                s = n(46),
                f = Object.getOwnPropertyDescriptor;
            e.f = r
                ? f
                : function (t, e) {
                      if (((t = u(t)), (e = c(e, !0)), s))
                          try {
                              return f(t, e);
                          } catch (t) {}
                      if (a(t, e)) return i(!o.f.call(t, e), t[e]);
                  };
        },
        function (t, e, n) {
            "use strict";
            var r = {}.propertyIsEnumerable,
                o = Object.getOwnPropertyDescriptor,
                i = o && !r.call({ 1: 2 }, 1);
            e.f = i
                ? function (t) {
                      var e = o(this, t);
                      return !!e && e.enumerable;
                  }
                : r;
        },
        function (t, e, n) {
            var r = n(6),
                o = n(4),
                i = n(47);
            t.exports =
                !r &&
                !o(function () {
                    return (
                        7 !=
                        Object.defineProperty(i("div"), "a", {
                            get: function () {
                                return 7;
                            },
                        }).a
                    );
                });
        },
        function (t, e, n) {
            var r = n(0),
                o = n(2),
                i = r.document,
                u = o(i) && o(i.createElement);
            t.exports = function (t) {
                return u ? i.createElement(t) : {};
            };
        },
        function (t, e, n) {
            var r = n(49),
                o = Function.toString;
            "function" != typeof r.inspectSource &&
                (r.inspectSource = function (t) {
                    return o.call(t);
                }),
                (t.exports = r.inspectSource);
        },
        function (t, e, n) {
            var r = n(0),
                o = n(26),
                i = r["__core-js_shared__"] || o("__core-js_shared__", {});
            t.exports = i;
        },
        function (t, e, n) {
            var r = n(0),
                o = n(48),
                i = r.WeakMap;
            t.exports = "function" == typeof i && /native code/.test(o(i));
        },
        function (t, e, n) {
            var r = n(28),
                o = n(49);
            (t.exports = function (t, e) {
                return o[t] || (o[t] = void 0 !== e ? e : {});
            })("versions", []).push({
                version: "3.6.4",
                mode: r ? "pure" : "global",
                copyright: "© 2020 Denis Pushkarev (zloirock.ru)",
            });
        },
        function (t, e, n) {
            var r = n(3),
                o = n(15),
                i = n(73).indexOf,
                u = n(16);
            t.exports = function (t, e) {
                var n,
                    c = o(t),
                    a = 0,
                    s = [];
                for (n in c) !r(u, n) && r(c, n) && s.push(n);
                for (; e.length > a; )
                    r(c, (n = e[a++])) && (~i(s, n) || s.push(n));
                return s;
            };
        },
        function (t, e) {
            e.f = Object.getOwnPropertySymbols;
        },
        function (t, e, n) {
            var r = n(4),
                o = /#|\.prototype\./,
                i = function (t, e) {
                    var n = c[u(t)];
                    return (
                        n == s ||
                        (n != a && ("function" == typeof e ? r(e) : !!e))
                    );
                },
                u = (i.normalize = function (t) {
                    return String(t).replace(o, ".").toLowerCase();
                }),
                c = (i.data = {}),
                a = (i.NATIVE = "N"),
                s = (i.POLYFILL = "P");
            t.exports = i;
        },
        function (t, e, n) {
            var r = n(1),
                o = n(12),
                i = r("iterator"),
                u = Array.prototype;
            t.exports = function (t) {
                return void 0 !== t && (o.Array === t || u[i] === t);
            };
        },
        function (t, e, n) {
            var r = n(4);
            t.exports =
                !!Object.getOwnPropertySymbols &&
                !r(function () {
                    return !String(Symbol());
                });
        },
        function (t, e, n) {
            var r = n(58),
                o = n(12),
                i = n(1)("iterator");
            t.exports = function (t) {
                if (null != t) return t[i] || t["@@iterator"] || o[r(t)];
            };
        },
        function (t, e, n) {
            var r = n(34),
                o = n(23),
                i = n(1)("toStringTag"),
                u =
                    "Arguments" ==
                    o(
                        (function () {
                            return arguments;
                        })()
                    );
            t.exports = r
                ? o
                : function (t) {
                      var e, n, r;
                      return void 0 === t
                          ? "Undefined"
                          : null === t
                          ? "Null"
                          : "string" ==
                            typeof (n = (function (t, e) {
                                try {
                                    return t[e];
                                } catch (t) {}
                            })((e = Object(t)), i))
                          ? n
                          : u
                          ? o(e)
                          : "Object" == (r = o(e)) &&
                            "function" == typeof e.callee
                          ? "Arguments"
                          : r;
                  };
        },
        function (t, e, n) {
            var r = n(7);
            t.exports = function (t, e, n, o) {
                try {
                    return o ? e(r(n)[0], n[1]) : e(n);
                } catch (e) {
                    var i = t.return;
                    throw (void 0 !== i && r(i.call(t)), e);
                }
            };
        },
        function (t, e, n) {
            var r = n(1)("iterator"),
                o = !1;
            try {
                var i = 0,
                    u = {
                        next: function () {
                            return { done: !!i++ };
                        },
                        return: function () {
                            o = !0;
                        },
                    };
                (u[r] = function () {
                    return this;
                }),
                    Array.from(u, function () {
                        throw 2;
                    });
            } catch (t) {}
            t.exports = function (t, e) {
                if (!e && !o) return !1;
                var n = !1;
                try {
                    var i = {};
                    (i[r] = function () {
                        return {
                            next: function () {
                                return { done: (n = !0) };
                            },
                        };
                    }),
                        t(i);
                } catch (t) {}
                return n;
            };
        },
        function (t, e, n) {
            var r = n(7),
                o = n(79);
            t.exports =
                Object.setPrototypeOf ||
                ("__proto__" in {}
                    ? (function () {
                          var t,
                              e = !1,
                              n = {};
                          try {
                              (t = Object.getOwnPropertyDescriptor(
                                  Object.prototype,
                                  "__proto__"
                              ).set).call(n, []),
                                  (e = n instanceof Array);
                          } catch (t) {}
                          return function (n, i) {
                              return (
                                  r(n),
                                  o(i),
                                  e ? t.call(n, i) : (n.__proto__ = i),
                                  n
                              );
                          };
                      })()
                    : void 0);
        },
        function (t, e, n) {
            "use strict";
            var r = n(5).f,
                o = n(37),
                i = n(38),
                u = n(19),
                c = n(35),
                a = n(33),
                s = n(39),
                f = n(84),
                l = n(6),
                p = n(18).fastKey,
                h = n(9),
                d = h.set,
                v = h.getterFor;
            t.exports = {
                getConstructor: function (t, e, n, s) {
                    var f = t(function (t, r) {
                            c(t, f, e),
                                d(t, {
                                    type: e,
                                    index: o(null),
                                    first: void 0,
                                    last: void 0,
                                    size: 0,
                                }),
                                l || (t.size = 0),
                                null != r && a(r, t[s], t, n);
                        }),
                        h = v(e),
                        y = function (t, e, n) {
                            var r,
                                o,
                                i = h(t),
                                u = m(t, e);
                            return (
                                u
                                    ? (u.value = n)
                                    : ((i.last = u =
                                          {
                                              index: (o = p(e, !0)),
                                              key: e,
                                              value: n,
                                              previous: (r = i.last),
                                              next: void 0,
                                              removed: !1,
                                          }),
                                      i.first || (i.first = u),
                                      r && (r.next = u),
                                      l ? i.size++ : t.size++,
                                      "F" !== o && (i.index[o] = u)),
                                t
                            );
                        },
                        m = function (t, e) {
                            var n,
                                r = h(t),
                                o = p(e);
                            if ("F" !== o) return r.index[o];
                            for (n = r.first; n; n = n.next)
                                if (n.key == e) return n;
                        };
                    return (
                        i(f.prototype, {
                            clear: function () {
                                for (
                                    var t = h(this), e = t.index, n = t.first;
                                    n;

                                )
                                    (n.removed = !0),
                                        n.previous &&
                                            (n.previous = n.previous.next =
                                                void 0),
                                        delete e[n.index],
                                        (n = n.next);
                                (t.first = t.last = void 0),
                                    l ? (t.size = 0) : (this.size = 0);
                            },
                            delete: function (t) {
                                var e = h(this),
                                    n = m(this, t);
                                if (n) {
                                    var r = n.next,
                                        o = n.previous;
                                    delete e.index[n.index],
                                        (n.removed = !0),
                                        o && (o.next = r),
                                        r && (r.previous = o),
                                        e.first == n && (e.first = r),
                                        e.last == n && (e.last = o),
                                        l ? e.size-- : this.size--;
                                }
                                return !!n;
                            },
                            forEach: function (t) {
                                for (
                                    var e,
                                        n = h(this),
                                        r = u(
                                            t,
                                            arguments.length > 1
                                                ? arguments[1]
                                                : void 0,
                                            3
                                        );
                                    (e = e ? e.next : n.first);

                                )
                                    for (
                                        r(e.value, e.key, this);
                                        e && e.removed;

                                    )
                                        e = e.previous;
                            },
                            has: function (t) {
                                return !!m(this, t);
                            },
                        }),
                        i(
                            f.prototype,
                            n
                                ? {
                                      get: function (t) {
                                          var e = m(this, t);
                                          return e && e.value;
                                      },
                                      set: function (t, e) {
                                          return y(this, 0 === t ? 0 : t, e);
                                      },
                                  }
                                : {
                                      add: function (t) {
                                          return y(
                                              this,
                                              (t = 0 === t ? 0 : t),
                                              t
                                          );
                                      },
                                  }
                        ),
                        l &&
                            r(f.prototype, "size", {
                                get: function () {
                                    return h(this).size;
                                },
                            }),
                        f
                    );
                },
                setStrong: function (t, e, n) {
                    var r = e + " Iterator",
                        o = v(e),
                        i = v(r);
                    s(
                        t,
                        e,
                        function (t, e) {
                            d(this, {
                                type: r,
                                target: t,
                                state: o(t),
                                kind: e,
                                last: void 0,
                            });
                        },
                        function () {
                            for (
                                var t = i(this), e = t.kind, n = t.last;
                                n && n.removed;

                            )
                                n = n.previous;
                            return t.target &&
                                (t.last = n = n ? n.next : t.state.first)
                                ? "keys" == e
                                    ? { value: n.key, done: !1 }
                                    : "values" == e
                                    ? { value: n.value, done: !1 }
                                    : { value: [n.key, n.value], done: !1 }
                                : ((t.target = void 0),
                                  { value: void 0, done: !0 });
                        },
                        n ? "entries" : "values",
                        !n,
                        !0
                    ),
                        f(e);
                },
            };
        },
        function (t, e, n) {
            var r = n(52),
                o = n(32);
            t.exports =
                Object.keys ||
                function (t) {
                    return r(t, o);
                };
        },
        function (t, e, n) {
            "use strict";
            var r,
                o,
                i,
                u = n(65),
                c = n(8),
                a = n(3),
                s = n(1),
                f = n(28),
                l = s("iterator"),
                p = !1;
            [].keys &&
                ("next" in (i = [].keys())
                    ? (o = u(u(i))) !== Object.prototype && (r = o)
                    : (p = !0)),
                null == r && (r = {}),
                f ||
                    a(r, l) ||
                    c(r, l, function () {
                        return this;
                    }),
                (t.exports = {
                    IteratorPrototype: r,
                    BUGGY_SAFARI_ITERATORS: p,
                });
        },
        function (t, e, n) {
            var r = n(3),
                o = n(20),
                i = n(27),
                u = n(83),
                c = i("IE_PROTO"),
                a = Object.prototype;
            t.exports = u
                ? Object.getPrototypeOf
                : function (t) {
                      return (
                          (t = o(t)),
                          r(t, c)
                              ? t[c]
                              : "function" == typeof t.constructor &&
                                t instanceof t.constructor
                              ? t.constructor.prototype
                              : t instanceof Object
                              ? a
                              : null
                      );
                  };
        },
        function (t, e, n) {
            "use strict";
            (function (t) {
                var n = "object" == typeof t && t && t.Object === Object && t;
                e.a = n;
            }.call(this, n(43)));
        },
        function (t, e, n) {
            t.exports = n(105);
        },
        function (t, e, n) {
            n(69), n(40), n(41), n(42);
            var r = n(10);
            t.exports = r.Map;
        },
        function (t, e, n) {
            "use strict";
            var r = n(21),
                o = n(62);
            t.exports = r(
                "Map",
                function (t) {
                    return function () {
                        return t(
                            this,
                            arguments.length ? arguments[0] : void 0
                        );
                    };
                },
                o
            );
        },
        function (t, e, n) {
            var r = n(3),
                o = n(71),
                i = n(44),
                u = n(5);
            t.exports = function (t, e) {
                for (var n = o(e), c = u.f, a = i.f, s = 0; s < n.length; s++) {
                    var f = n[s];
                    r(t, f) || c(t, f, a(e, f));
                }
            };
        },
        function (t, e, n) {
            var r = n(30),
                o = n(72),
                i = n(53),
                u = n(7);
            t.exports =
                r("Reflect", "ownKeys") ||
                function (t) {
                    var e = o.f(u(t)),
                        n = i.f;
                    return n ? e.concat(n(t)) : e;
                };
        },
        function (t, e, n) {
            var r = n(52),
                o = n(32).concat("length", "prototype");
            e.f =
                Object.getOwnPropertyNames ||
                function (t) {
                    return r(t, o);
                };
        },
        function (t, e, n) {
            var r = n(15),
                o = n(17),
                i = n(74),
                u = function (t) {
                    return function (e, n, u) {
                        var c,
                            a = r(e),
                            s = o(a.length),
                            f = i(u, s);
                        if (t && n != n) {
                            for (; s > f; ) if ((c = a[f++]) != c) return !0;
                        } else
                            for (; s > f; f++)
                                if ((t || f in a) && a[f] === n)
                                    return t || f || 0;
                        return !t && -1;
                    };
                };
            t.exports = { includes: u(!0), indexOf: u(!1) };
        },
        function (t, e, n) {
            var r = n(31),
                o = Math.max,
                i = Math.min;
            t.exports = function (t, e) {
                var n = r(t);
                return n < 0 ? o(n + e, 0) : i(n, e);
            };
        },
        function (t, e, n) {
            var r = n(4);
            t.exports = !r(function () {
                return Object.isExtensible(Object.preventExtensions({}));
            });
        },
        function (t, e, n) {
            var r = n(56);
            t.exports = r && !Symbol.sham && "symbol" == typeof Symbol.iterator;
        },
        function (t, e) {
            t.exports = function (t) {
                if ("function" != typeof t)
                    throw TypeError(String(t) + " is not a function");
                return t;
            };
        },
        function (t, e, n) {
            var r = n(2),
                o = n(61);
            t.exports = function (t, e, n) {
                var i, u;
                return (
                    o &&
                        "function" == typeof (i = e.constructor) &&
                        i !== n &&
                        r((u = i.prototype)) &&
                        u !== n.prototype &&
                        o(t, u),
                    t
                );
            };
        },
        function (t, e, n) {
            var r = n(2);
            t.exports = function (t) {
                if (!r(t) && null !== t)
                    throw TypeError(
                        "Can't set " + String(t) + " as a prototype"
                    );
                return t;
            };
        },
        function (t, e, n) {
            var r = n(6),
                o = n(5),
                i = n(7),
                u = n(63);
            t.exports = r
                ? Object.defineProperties
                : function (t, e) {
                      i(t);
                      for (var n, r = u(e), c = r.length, a = 0; c > a; )
                          o.f(t, (n = r[a++]), e[n]);
                      return t;
                  };
        },
        function (t, e, n) {
            var r = n(30);
            t.exports = r("document", "documentElement");
        },
        function (t, e, n) {
            "use strict";
            var r = n(64).IteratorPrototype,
                o = n(37),
                i = n(14),
                u = n(36),
                c = n(12),
                a = function () {
                    return this;
                };
            t.exports = function (t, e, n) {
                var s = e + " Iterator";
                return (
                    (t.prototype = o(r, { next: i(1, n) })),
                    u(t, s, !1, !0),
                    (c[s] = a),
                    t
                );
            };
        },
        function (t, e, n) {
            var r = n(4);
            t.exports = !r(function () {
                function t() {}
                return (
                    (t.prototype.constructor = null),
                    Object.getPrototypeOf(new t()) !== t.prototype
                );
            });
        },
        function (t, e, n) {
            "use strict";
            var r = n(30),
                o = n(5),
                i = n(1),
                u = n(6),
                c = i("species");
            t.exports = function (t) {
                var e = r(t),
                    n = o.f;
                u &&
                    e &&
                    !e[c] &&
                    n(e, c, {
                        configurable: !0,
                        get: function () {
                            return this;
                        },
                    });
            };
        },
        function (t, e, n) {
            "use strict";
            var r = n(34),
                o = n(58);
            t.exports = r
                ? {}.toString
                : function () {
                      return "[object " + o(this) + "]";
                  };
        },
        function (t, e, n) {
            var r = n(31),
                o = n(24),
                i = function (t) {
                    return function (e, n) {
                        var i,
                            u,
                            c = String(o(e)),
                            a = r(n),
                            s = c.length;
                        return a < 0 || a >= s
                            ? t
                                ? ""
                                : void 0
                            : (i = c.charCodeAt(a)) < 55296 ||
                              i > 56319 ||
                              a + 1 === s ||
                              (u = c.charCodeAt(a + 1)) < 56320 ||
                              u > 57343
                            ? t
                                ? c.charAt(a)
                                : i
                            : t
                            ? c.slice(a, a + 2)
                            : u - 56320 + ((i - 55296) << 10) + 65536;
                    };
                };
            t.exports = { codeAt: i(!1), charAt: i(!0) };
        },
        function (t, e) {
            t.exports = {
                CSSRuleList: 0,
                CSSStyleDeclaration: 0,
                CSSValueList: 0,
                ClientRectList: 0,
                DOMRectList: 0,
                DOMStringList: 0,
                DOMTokenList: 1,
                DataTransferItemList: 0,
                FileList: 0,
                HTMLAllCollection: 0,
                HTMLCollection: 0,
                HTMLFormElement: 0,
                HTMLSelectElement: 0,
                MediaList: 0,
                MimeTypeArray: 0,
                NamedNodeMap: 0,
                NodeList: 1,
                PaintRequestList: 0,
                Plugin: 0,
                PluginArray: 0,
                SVGLengthList: 0,
                SVGNumberList: 0,
                SVGPathSegList: 0,
                SVGPointList: 0,
                SVGStringList: 0,
                SVGTransformList: 0,
                SourceBufferList: 0,
                StyleSheetList: 0,
                TextTrackCueList: 0,
                TextTrackList: 0,
                TouchList: 0,
            };
        },
        function (t, e, n) {
            "use strict";
            var r = n(15),
                o = n(89),
                i = n(12),
                u = n(9),
                c = n(39),
                a = u.set,
                s = u.getterFor("Array Iterator");
            (t.exports = c(
                Array,
                "Array",
                function (t, e) {
                    a(this, {
                        type: "Array Iterator",
                        target: r(t),
                        index: 0,
                        kind: e,
                    });
                },
                function () {
                    var t = s(this),
                        e = t.target,
                        n = t.kind,
                        r = t.index++;
                    return !e || r >= e.length
                        ? ((t.target = void 0), { value: void 0, done: !0 })
                        : "keys" == n
                        ? { value: r, done: !1 }
                        : "values" == n
                        ? { value: e[r], done: !1 }
                        : { value: [r, e[r]], done: !1 };
                },
                "values"
            )),
                (i.Arguments = i.Array),
                o("keys"),
                o("values"),
                o("entries");
        },
        function (t, e, n) {
            var r = n(1),
                o = n(37),
                i = n(5),
                u = r("unscopables"),
                c = Array.prototype;
            null == c[u] && i.f(c, u, { configurable: !0, value: o(null) }),
                (t.exports = function (t) {
                    c[u][t] = !0;
                });
        },
        function (t, e, n) {
            n(91), n(40), n(41), n(42);
            var r = n(10);
            t.exports = r.Set;
        },
        function (t, e, n) {
            "use strict";
            var r = n(21),
                o = n(62);
            t.exports = r(
                "Set",
                function (t) {
                    return function () {
                        return t(
                            this,
                            arguments.length ? arguments[0] : void 0
                        );
                    };
                },
                o
            );
        },
        function (t, e, n) {
            n(40), n(93), n(42);
            var r = n(10);
            t.exports = r.WeakMap;
        },
        function (t, e, n) {
            "use strict";
            var r,
                o = n(0),
                i = n(38),
                u = n(18),
                c = n(21),
                a = n(94),
                s = n(2),
                f = n(9).enforce,
                l = n(50),
                p = !o.ActiveXObject && "ActiveXObject" in o,
                h = Object.isExtensible,
                d = function (t) {
                    return function () {
                        return t(
                            this,
                            arguments.length ? arguments[0] : void 0
                        );
                    };
                },
                v = (t.exports = c("WeakMap", d, a));
            if (l && p) {
                (r = a.getConstructor(d, "WeakMap", !0)), (u.REQUIRED = !0);
                var y = v.prototype,
                    m = y.delete,
                    g = y.has,
                    b = y.get,
                    x = y.set;
                i(y, {
                    delete: function (t) {
                        if (s(t) && !h(t)) {
                            var e = f(this);
                            return (
                                e.frozen || (e.frozen = new r()),
                                m.call(this, t) || e.frozen.delete(t)
                            );
                        }
                        return m.call(this, t);
                    },
                    has: function (t) {
                        if (s(t) && !h(t)) {
                            var e = f(this);
                            return (
                                e.frozen || (e.frozen = new r()),
                                g.call(this, t) || e.frozen.has(t)
                            );
                        }
                        return g.call(this, t);
                    },
                    get: function (t) {
                        if (s(t) && !h(t)) {
                            var e = f(this);
                            return (
                                e.frozen || (e.frozen = new r()),
                                g.call(this, t)
                                    ? b.call(this, t)
                                    : e.frozen.get(t)
                            );
                        }
                        return b.call(this, t);
                    },
                    set: function (t, e) {
                        if (s(t) && !h(t)) {
                            var n = f(this);
                            n.frozen || (n.frozen = new r()),
                                g.call(this, t)
                                    ? x.call(this, t, e)
                                    : n.frozen.set(t, e);
                        } else x.call(this, t, e);
                        return this;
                    },
                });
            }
        },
        function (t, e, n) {
            "use strict";
            var r = n(38),
                o = n(18).getWeakData,
                i = n(7),
                u = n(2),
                c = n(35),
                a = n(33),
                s = n(95),
                f = n(3),
                l = n(9),
                p = l.set,
                h = l.getterFor,
                d = s.find,
                v = s.findIndex,
                y = 0,
                m = function (t) {
                    return t.frozen || (t.frozen = new g());
                },
                g = function () {
                    this.entries = [];
                },
                b = function (t, e) {
                    return d(t.entries, function (t) {
                        return t[0] === e;
                    });
                };
            (g.prototype = {
                get: function (t) {
                    var e = b(this, t);
                    if (e) return e[1];
                },
                has: function (t) {
                    return !!b(this, t);
                },
                set: function (t, e) {
                    var n = b(this, t);
                    n ? (n[1] = e) : this.entries.push([t, e]);
                },
                delete: function (t) {
                    var e = v(this.entries, function (e) {
                        return e[0] === t;
                    });
                    return ~e && this.entries.splice(e, 1), !!~e;
                },
            }),
                (t.exports = {
                    getConstructor: function (t, e, n, s) {
                        var l = t(function (t, r) {
                                c(t, l, e),
                                    p(t, { type: e, id: y++, frozen: void 0 }),
                                    null != r && a(r, t[s], t, n);
                            }),
                            d = h(e),
                            v = function (t, e, n) {
                                var r = d(t),
                                    u = o(i(e), !0);
                                return (
                                    !0 === u ? m(r).set(e, n) : (u[r.id] = n), t
                                );
                            };
                        return (
                            r(l.prototype, {
                                delete: function (t) {
                                    var e = d(this);
                                    if (!u(t)) return !1;
                                    var n = o(t);
                                    return !0 === n
                                        ? m(e).delete(t)
                                        : n && f(n, e.id) && delete n[e.id];
                                },
                                has: function (t) {
                                    var e = d(this);
                                    if (!u(t)) return !1;
                                    var n = o(t);
                                    return !0 === n
                                        ? m(e).has(t)
                                        : n && f(n, e.id);
                                },
                            }),
                            r(
                                l.prototype,
                                n
                                    ? {
                                          get: function (t) {
                                              var e = d(this);
                                              if (u(t)) {
                                                  var n = o(t);
                                                  return !0 === n
                                                      ? m(e).get(t)
                                                      : n
                                                      ? n[e.id]
                                                      : void 0;
                                              }
                                          },
                                          set: function (t, e) {
                                              return v(this, t, e);
                                          },
                                      }
                                    : {
                                          add: function (t) {
                                              return v(this, t, !0);
                                          },
                                      }
                            ),
                            l
                        );
                    },
                });
        },
        function (t, e, n) {
            var r = n(19),
                o = n(22),
                i = n(20),
                u = n(17),
                c = n(96),
                a = [].push,
                s = function (t) {
                    var e = 1 == t,
                        n = 2 == t,
                        s = 3 == t,
                        f = 4 == t,
                        l = 6 == t,
                        p = 5 == t || l;
                    return function (h, d, v, y) {
                        for (
                            var m,
                                g,
                                b = i(h),
                                x = o(b),
                                w = r(d, v, 3),
                                S = u(x.length),
                                O = 0,
                                _ = y || c,
                                E = e ? _(h, S) : n ? _(h, 0) : void 0;
                            S > O;
                            O++
                        )
                            if ((p || O in x) && ((g = w((m = x[O]), O, b)), t))
                                if (e) E[O] = g;
                                else if (g)
                                    switch (t) {
                                        case 3:
                                            return !0;
                                        case 5:
                                            return m;
                                        case 6:
                                            return O;
                                        case 2:
                                            a.call(E, m);
                                    }
                                else if (f) return !1;
                        return l ? -1 : s || f ? f : E;
                    };
                };
            t.exports = {
                forEach: s(0),
                map: s(1),
                filter: s(2),
                some: s(3),
                every: s(4),
                find: s(5),
                findIndex: s(6),
            };
        },
        function (t, e, n) {
            var r = n(2),
                o = n(97),
                i = n(1)("species");
            t.exports = function (t, e) {
                var n;
                return (
                    o(t) &&
                        ("function" != typeof (n = t.constructor) ||
                        (n !== Array && !o(n.prototype))
                            ? r(n) && null === (n = n[i]) && (n = void 0)
                            : (n = void 0)),
                    new (void 0 === n ? Array : n)(0 === e ? 0 : e)
                );
            };
        },
        function (t, e, n) {
            var r = n(23);
            t.exports =
                Array.isArray ||
                function (t) {
                    return "Array" == r(t);
                };
        },
        function (t, e, n) {
            n(41), n(99);
            var r = n(10);
            t.exports = r.Array.from;
        },
        function (t, e, n) {
            var r = n(13),
                o = n(100);
            r(
                {
                    target: "Array",
                    stat: !0,
                    forced: !n(60)(function (t) {
                        Array.from(t);
                    }),
                },
                { from: o }
            );
        },
        function (t, e, n) {
            "use strict";
            var r = n(19),
                o = n(20),
                i = n(59),
                u = n(55),
                c = n(17),
                a = n(101),
                s = n(57);
            t.exports = function (t) {
                var e,
                    n,
                    f,
                    l,
                    p,
                    h,
                    d = o(t),
                    v = "function" == typeof this ? this : Array,
                    y = arguments.length,
                    m = y > 1 ? arguments[1] : void 0,
                    g = void 0 !== m,
                    b = s(d),
                    x = 0;
                if (
                    (g && (m = r(m, y > 2 ? arguments[2] : void 0, 2)),
                    null == b || (v == Array && u(b)))
                )
                    for (n = new v((e = c(d.length))); e > x; x++)
                        (h = g ? m(d[x], x) : d[x]), a(n, x, h);
                else
                    for (
                        p = (l = b.call(d)).next, n = new v();
                        !(f = p.call(l)).done;
                        x++
                    )
                        (h = g ? i(l, m, [f.value, x], !0) : f.value),
                            a(n, x, h);
                return (n.length = x), n;
            };
        },
        function (t, e, n) {
            "use strict";
            var r = n(25),
                o = n(5),
                i = n(14);
            t.exports = function (t, e, n) {
                var u = r(e);
                u in t ? o.f(t, u, i(0, n)) : (t[u] = n);
            };
        },
        function (t, e, n) {
            n(103);
            var r = n(10);
            t.exports = r.Object.assign;
        },
        function (t, e, n) {
            var r = n(13),
                o = n(104);
            r(
                { target: "Object", stat: !0, forced: Object.assign !== o },
                { assign: o }
            );
        },
        function (t, e, n) {
            "use strict";
            var r = n(6),
                o = n(4),
                i = n(63),
                u = n(53),
                c = n(45),
                a = n(20),
                s = n(22),
                f = Object.assign,
                l = Object.defineProperty;
            t.exports =
                !f ||
                o(function () {
                    if (
                        r &&
                        1 !==
                            f(
                                { b: 1 },
                                f(
                                    l({}, "a", {
                                        enumerable: !0,
                                        get: function () {
                                            l(this, "b", {
                                                value: 3,
                                                enumerable: !1,
                                            });
                                        },
                                    }),
                                    { b: 2 }
                                )
                            ).b
                    )
                        return !0;
                    var t = {},
                        e = {},
                        n = Symbol();
                    return (
                        (t[n] = 7),
                        "abcdefghijklmnopqrst".split("").forEach(function (t) {
                            e[t] = t;
                        }),
                        7 != f({}, t)[n] ||
                            "abcdefghijklmnopqrst" != i(f({}, e)).join("")
                    );
                })
                    ? function (t, e) {
                          for (
                              var n = a(t),
                                  o = arguments.length,
                                  f = 1,
                                  l = u.f,
                                  p = c.f;
                              o > f;

                          )
                              for (
                                  var h,
                                      d = s(arguments[f++]),
                                      v = l ? i(d).concat(l(d)) : i(d),
                                      y = v.length,
                                      m = 0;
                                  y > m;

                              )
                                  (h = v[m++]),
                                      (r && !p.call(d, h)) || (n[h] = d[h]);
                          return n;
                      }
                    : f;
        },
        function (t, e, n) {
            "use strict";
            n.r(e);
            var r = {};
            n.r(r),
                n.d(r, "keyboardHandler", function () {
                    return ot;
                }),
                n.d(r, "mouseHandler", function () {
                    return it;
                }),
                n.d(r, "resizeHandler", function () {
                    return ut;
                }),
                n.d(r, "selectHandler", function () {
                    return ct;
                }),
                n.d(r, "touchHandler", function () {
                    return at;
                }),
                n.d(r, "wheelHandler", function () {
                    return st;
                });
            /*! *****************************************************************************
Copyright (c) Microsoft Corporation. All rights reserved.
Licensed under the Apache License, Version 2.0 (the "License"); you may not use
this file except in compliance with the License. You may obtain a copy of the
License at http://www.apache.org/licenses/LICENSE-2.0

THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
MERCHANTABLITY OR NON-INFRINGEMENT.

See the Apache Version 2.0 License for specific language governing permissions
and limitations under the License.
***************************************************************************** */
            var o = function (t, e) {
                    return (o =
                        Object.setPrototypeOf ||
                        ({ __proto__: [] } instanceof Array &&
                            function (t, e) {
                                t.__proto__ = e;
                            }) ||
                        function (t, e) {
                            for (var n in e)
                                e.hasOwnProperty(n) && (t[n] = e[n]);
                        })(t, e);
                },
                i = function () {
                    return (i =
                        Object.assign ||
                        function (t) {
                            for (var e, n = 1, r = arguments.length; n < r; n++)
                                for (var o in (e = arguments[n]))
                                    Object.prototype.hasOwnProperty.call(
                                        e,
                                        o
                                    ) && (t[o] = e[o]);
                            return t;
                        }).apply(this, arguments);
                };
            function u(t, e, n, r) {
                var o,
                    i = arguments.length,
                    u =
                        i < 3
                            ? e
                            : null === r
                            ? (r = Object.getOwnPropertyDescriptor(e, n))
                            : r;
                if (
                    "object" == typeof Reflect &&
                    "function" == typeof Reflect.decorate
                )
                    u = Reflect.decorate(t, e, n, r);
                else
                    for (var c = t.length - 1; c >= 0; c--)
                        (o = t[c]) &&
                            (u =
                                (i < 3 ? o(u) : i > 3 ? o(e, n, u) : o(e, n)) ||
                                u);
                return i > 3 && u && Object.defineProperty(e, n, u), u;
            }
            n(68), n(90), n(92), n(98), n(102);
            var c = /\s/,
                a = /^\s+/,
                s = function (t) {
                    return t
                        ? t
                              .slice(
                                  0,
                                  (function (t) {
                                      for (
                                          var e = t.length;
                                          e-- && c.test(t.charAt(e));

                                      );
                                      return e;
                                  })(t) + 1
                              )
                              .replace(a, "")
                        : t;
                },
                f = function (t) {
                    var e = typeof t;
                    return null != t && ("object" == e || "function" == e);
                },
                l = n(66),
                p =
                    "object" == typeof self &&
                    self &&
                    self.Object === Object &&
                    self,
                h = l.a || p || Function("return this")(),
                d = h.Symbol,
                v = Object.prototype,
                y = v.hasOwnProperty,
                m = v.toString,
                g = d ? d.toStringTag : void 0,
                b = Object.prototype.toString,
                x = d ? d.toStringTag : void 0,
                w = function (t) {
                    return null == t
                        ? void 0 === t
                            ? "[object Undefined]"
                            : "[object Null]"
                        : x && x in Object(t)
                        ? (function (t) {
                              var e = y.call(t, g),
                                  n = t[g];
                              try {
                                  t[g] = void 0;
                                  var r = !0;
                              } catch (t) {}
                              var o = m.call(t);
                              return r && (e ? (t[g] = n) : delete t[g]), o;
                          })(t)
                        : (function (t) {
                              return b.call(t);
                          })(t);
                },
                S = /^[-+]0x[0-9a-f]+$/i,
                O = /^0b[01]+$/i,
                _ = /^0o[0-7]+$/i,
                E = parseInt,
                T = function (t) {
                    if ("number" == typeof t) return t;
                    if (
                        (function (t) {
                            return (
                                "symbol" == typeof t ||
                                ((function (t) {
                                    return null != t && "object" == typeof t;
                                })(t) &&
                                    "[object Symbol]" == w(t))
                            );
                        })(t)
                    )
                        return NaN;
                    if (f(t)) {
                        var e =
                            "function" == typeof t.valueOf ? t.valueOf() : t;
                        t = f(e) ? e + "" : e;
                    }
                    if ("string" != typeof t) return 0 === t ? t : +t;
                    t = s(t);
                    var n = O.test(t);
                    return n || _.test(t)
                        ? E(t.slice(2), n ? 2 : 8)
                        : S.test(t)
                        ? NaN
                        : +t;
                },
                A = function (t, e, n) {
                    return (
                        void 0 === n && ((n = e), (e = void 0)),
                        void 0 !== n && (n = (n = T(n)) == n ? n : 0),
                        void 0 !== e && (e = (e = T(e)) == e ? e : 0),
                        (function (t, e, n) {
                            return (
                                t == t &&
                                    (void 0 !== n && (t = t <= n ? t : n),
                                    void 0 !== e && (t = t >= e ? t : e)),
                                t
                            );
                        })(T(t), e, n)
                    );
                };
            function j(t, e) {
                return (
                    void 0 === t && (t = -1 / 0),
                    void 0 === e && (e = 1 / 0),
                    function (n, r) {
                        var o = "_" + r;
                        Object.defineProperty(n, r, {
                            get: function () {
                                return this[o];
                            },
                            set: function (n) {
                                Object.defineProperty(this, o, {
                                    value: A(n, t, e),
                                    enumerable: !1,
                                    writable: !0,
                                    configurable: !0,
                                });
                            },
                            enumerable: !0,
                            configurable: !0,
                        });
                    }
                );
            }
            function P(t, e) {
                var n = "_" + e;
                Object.defineProperty(t, e, {
                    get: function () {
                        return this[n];
                    },
                    set: function (t) {
                        Object.defineProperty(this, n, {
                            value: !!t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0,
                        });
                    },
                    enumerable: !0,
                    configurable: !0,
                });
            }
            var M = function () {
                    return h.Date.now();
                },
                k = Math.max,
                z = Math.min,
                D = function (t, e, n) {
                    var r,
                        o,
                        i,
                        u,
                        c,
                        a,
                        s = 0,
                        l = !1,
                        p = !1,
                        h = !0;
                    if ("function" != typeof t)
                        throw new TypeError("Expected a function");
                    function d(e) {
                        var n = r,
                            i = o;
                        return (r = o = void 0), (s = e), (u = t.apply(i, n));
                    }
                    function v(t) {
                        var n = t - a;
                        return (
                            void 0 === a || n >= e || n < 0 || (p && t - s >= i)
                        );
                    }
                    function y() {
                        var t = M();
                        if (v(t)) return m(t);
                        c = setTimeout(
                            y,
                            (function (t) {
                                var n = e - (t - a);
                                return p ? z(n, i - (t - s)) : n;
                            })(t)
                        );
                    }
                    function m(t) {
                        return (
                            (c = void 0), h && r ? d(t) : ((r = o = void 0), u)
                        );
                    }
                    function g() {
                        var t = M(),
                            n = v(t);
                        if (((r = arguments), (o = this), (a = t), n)) {
                            if (void 0 === c)
                                return (function (t) {
                                    return (
                                        (s = t),
                                        (c = setTimeout(y, e)),
                                        l ? d(t) : u
                                    );
                                })(a);
                            if (p)
                                return (
                                    clearTimeout(c),
                                    (c = setTimeout(y, e)),
                                    d(a)
                                );
                        }
                        return void 0 === c && (c = setTimeout(y, e)), u;
                    }
                    return (
                        (e = T(e) || 0),
                        f(n) &&
                            ((l = !!n.leading),
                            (i = (p = "maxWait" in n)
                                ? k(T(n.maxWait) || 0, e)
                                : i),
                            (h = "trailing" in n ? !!n.trailing : h)),
                        (g.cancel = function () {
                            void 0 !== c && clearTimeout(c),
                                (s = 0),
                                (r = a = o = c = void 0);
                        }),
                        (g.flush = function () {
                            return void 0 === c ? u : m(M());
                        }),
                        g
                    );
                };
            function L() {
                for (var t = [], e = 0; e < arguments.length; e++)
                    t[e] = arguments[e];
                return function (e, n, r) {
                    var o = r.value;
                    return {
                        get: function () {
                            return (
                                this.hasOwnProperty(n) ||
                                    Object.defineProperty(this, n, {
                                        value: D.apply(
                                            void 0,
                                            (function () {
                                                for (
                                                    var t = 0,
                                                        e = 0,
                                                        n = arguments.length;
                                                    e < n;
                                                    e++
                                                )
                                                    t += arguments[e].length;
                                                var r = Array(t),
                                                    o = 0;
                                                for (e = 0; e < n; e++)
                                                    for (
                                                        var i = arguments[e],
                                                            u = 0,
                                                            c = i.length;
                                                        u < c;
                                                        u++, o++
                                                    )
                                                        r[o] = i[u];
                                                return r;
                                            })([o], t)
                                        ),
                                    }),
                                this[n]
                            );
                        },
                    };
                };
            }
            var I,
                N = (function () {
                    function t(t) {
                        var e = this;
                        void 0 === t && (t = {}),
                            (this.damping = 0.1),
                            (this.thumbMinSize = 20),
                            (this.renderByPixels = !0),
                            (this.alwaysShowTracks = !1),
                            (this.continuousScrolling = !0),
                            (this.delegateTo = null),
                            (this.plugins = {}),
                            Object.keys(t).forEach(function (n) {
                                e[n] = t[n];
                            });
                    }
                    return (
                        Object.defineProperty(t.prototype, "wheelEventTarget", {
                            get: function () {
                                return this.delegateTo;
                            },
                            set: function (t) {
                                console.warn(
                                    "[smooth-scrollbar]: `options.wheelEventTarget` is deprecated and will be removed in the future, use `options.delegateTo` instead."
                                ),
                                    (this.delegateTo = t);
                            },
                            enumerable: !0,
                            configurable: !0,
                        }),
                        u([j(0, 1)], t.prototype, "damping", void 0),
                        u([j(0, 1 / 0)], t.prototype, "thumbMinSize", void 0),
                        u([P], t.prototype, "renderByPixels", void 0),
                        u([P], t.prototype, "alwaysShowTracks", void 0),
                        u([P], t.prototype, "continuousScrolling", void 0),
                        t
                    );
                })(),
                C = new WeakMap();
            function R() {
                if (void 0 !== I) return I;
                var t = !1;
                try {
                    var e = function () {},
                        n = Object.defineProperty({}, "passive", {
                            get: function () {
                                t = !0;
                            },
                        });
                    window.addEventListener("testPassive", e, n),
                        window.removeEventListener("testPassive", e, n);
                } catch (t) {}
                return (I = !!t && { passive: !1 });
            }
            function F(t) {
                var e = C.get(t) || [];
                return (
                    C.set(t, e),
                    function (t, n, r) {
                        function o(t) {
                            t.defaultPrevented || r(t);
                        }
                        n.split(/\s+/g).forEach(function (n) {
                            e.push({ elem: t, eventName: n, handler: o }),
                                t.addEventListener(n, o, R());
                        });
                    }
                );
            }
            function H(t) {
                var e = (function (t) {
                    return t.touches ? t.touches[t.touches.length - 1] : t;
                })(t);
                return { x: e.clientX, y: e.clientY };
            }
            function W(t, e) {
                return (
                    void 0 === e && (e = []),
                    e.some(function (e) {
                        return t === e;
                    })
                );
            }
            var G = ["webkit", "moz", "ms", "o"],
                B = new RegExp("^-(?!(?:" + G.join("|") + ")-)");
            function U(t, e) {
                (e = (function (t) {
                    var e = {};
                    return (
                        Object.keys(t).forEach(function (n) {
                            if (B.test(n)) {
                                var r = t[n];
                                (n = n.replace(/^-/, "")),
                                    (e[n] = r),
                                    G.forEach(function (t) {
                                        e["-" + t + "-" + n] = r;
                                    });
                            } else e[n] = t[n];
                        }),
                        e
                    );
                })(e)),
                    Object.keys(e).forEach(function (n) {
                        var r = n
                            .replace(/^-/, "")
                            .replace(/-([a-z])/g, function (t, e) {
                                return e.toUpperCase();
                            });
                        t.style[r] = e[n];
                    });
            }
            var X,
                V = (function () {
                    function t(t) {
                        (this.updateTime = Date.now()),
                            (this.delta = { x: 0, y: 0 }),
                            (this.velocity = { x: 0, y: 0 }),
                            (this.lastPosition = { x: 0, y: 0 }),
                            (this.lastPosition = H(t));
                    }
                    return (
                        (t.prototype.update = function (t) {
                            var e = this.velocity,
                                n = this.updateTime,
                                r = this.lastPosition,
                                o = Date.now(),
                                i = H(t),
                                u = { x: -(i.x - r.x), y: -(i.y - r.y) },
                                c = o - n || 16,
                                a = (u.x / c) * 16,
                                s = (u.y / c) * 16;
                            (e.x = 0.9 * a + 0.1 * e.x),
                                (e.y = 0.9 * s + 0.1 * e.y),
                                (this.delta = u),
                                (this.updateTime = o),
                                (this.lastPosition = i);
                        }),
                        t
                    );
                })(),
                Y = (function () {
                    function t() {
                        this._touchList = {};
                    }
                    return (
                        Object.defineProperty(t.prototype, "_primitiveValue", {
                            get: function () {
                                return { x: 0, y: 0 };
                            },
                            enumerable: !0,
                            configurable: !0,
                        }),
                        (t.prototype.isActive = function () {
                            return void 0 !== this._activeTouchID;
                        }),
                        (t.prototype.getDelta = function () {
                            var t = this._getActiveTracker();
                            return t ? i({}, t.delta) : this._primitiveValue;
                        }),
                        (t.prototype.getVelocity = function () {
                            var t = this._getActiveTracker();
                            return t ? i({}, t.velocity) : this._primitiveValue;
                        }),
                        (t.prototype.track = function (t) {
                            var e = this,
                                n = t.targetTouches;
                            return (
                                Array.from(n).forEach(function (t) {
                                    e._add(t);
                                }),
                                this._touchList
                            );
                        }),
                        (t.prototype.update = function (t) {
                            var e = this,
                                n = t.touches,
                                r = t.changedTouches;
                            return (
                                Array.from(n).forEach(function (t) {
                                    e._renew(t);
                                }),
                                this._setActiveID(r),
                                this._touchList
                            );
                        }),
                        (t.prototype.release = function (t) {
                            var e = this;
                            delete this._activeTouchID,
                                Array.from(t.changedTouches).forEach(function (
                                    t
                                ) {
                                    e._delete(t);
                                });
                        }),
                        (t.prototype._add = function (t) {
                            if (!this._has(t)) {
                                var e = new V(t);
                                this._touchList[t.identifier] = e;
                            }
                        }),
                        (t.prototype._renew = function (t) {
                            this._has(t) &&
                                this._touchList[t.identifier].update(t);
                        }),
                        (t.prototype._delete = function (t) {
                            delete this._touchList[t.identifier];
                        }),
                        (t.prototype._has = function (t) {
                            return this._touchList.hasOwnProperty(t.identifier);
                        }),
                        (t.prototype._setActiveID = function (t) {
                            this._activeTouchID = t[t.length - 1].identifier;
                        }),
                        (t.prototype._getActiveTracker = function () {
                            return this._touchList[this._activeTouchID];
                        }),
                        t
                    );
                })();
            !(function (t) {
                (t.X = "x"), (t.Y = "y");
            })(X || (X = {}));
            var q = (function () {
                    function t(t, e) {
                        void 0 === e && (e = 0),
                            (this._direction = t),
                            (this._minSize = e),
                            (this.element = document.createElement("div")),
                            (this.displaySize = 0),
                            (this.realSize = 0),
                            (this.offset = 0),
                            (this.element.className =
                                "scrollbar-thumb scrollbar-thumb-" + t);
                    }
                    return (
                        (t.prototype.attachTo = function (t) {
                            t.appendChild(this.element);
                        }),
                        (t.prototype.update = function (t, e, n) {
                            (this.realSize = Math.min(e / n, 1) * e),
                                (this.displaySize = Math.max(
                                    this.realSize,
                                    this._minSize
                                )),
                                (this.offset =
                                    (t / n) *
                                    (e + (this.realSize - this.displaySize))),
                                U(this.element, this._getStyle());
                        }),
                        (t.prototype._getStyle = function () {
                            switch (this._direction) {
                                case X.X:
                                    return {
                                        width: this.displaySize + "px",
                                        "-transform":
                                            "translate3d(" +
                                            this.offset +
                                            "px, 0, 0)",
                                    };
                                case X.Y:
                                    return {
                                        height: this.displaySize + "px",
                                        "-transform":
                                            "translate3d(0, " +
                                            this.offset +
                                            "px, 0)",
                                    };
                                default:
                                    return null;
                            }
                        }),
                        t
                    );
                })(),
                K = (function () {
                    function t(t, e) {
                        void 0 === e && (e = 0),
                            (this.element = document.createElement("div")),
                            (this._isShown = !1),
                            (this.element.className =
                                "scrollbar-track scrollbar-track-" + t),
                            (this.thumb = new q(t, e)),
                            this.thumb.attachTo(this.element);
                    }
                    return (
                        (t.prototype.attachTo = function (t) {
                            t.appendChild(this.element);
                        }),
                        (t.prototype.show = function () {
                            this._isShown ||
                                ((this._isShown = !0),
                                this.element.classList.add("show"));
                        }),
                        (t.prototype.hide = function () {
                            this._isShown &&
                                ((this._isShown = !1),
                                this.element.classList.remove("show"));
                        }),
                        (t.prototype.update = function (t, e, n) {
                            U(this.element, {
                                display: n <= e ? "none" : "block",
                            }),
                                this.thumb.update(t, e, n);
                        }),
                        t
                    );
                })(),
                Q = (function () {
                    function t(t) {
                        this._scrollbar = t;
                        var e = t.options.thumbMinSize;
                        (this.xAxis = new K(X.X, e)),
                            (this.yAxis = new K(X.Y, e)),
                            this.xAxis.attachTo(t.containerEl),
                            this.yAxis.attachTo(t.containerEl),
                            t.options.alwaysShowTracks &&
                                (this.xAxis.show(), this.yAxis.show());
                    }
                    return (
                        (t.prototype.update = function () {
                            var t = this._scrollbar,
                                e = t.size,
                                n = t.offset;
                            this.xAxis.update(
                                n.x,
                                e.container.width,
                                e.content.width
                            ),
                                this.yAxis.update(
                                    n.y,
                                    e.container.height,
                                    e.content.height
                                );
                        }),
                        (t.prototype.autoHideOnIdle = function () {
                            this._scrollbar.options.alwaysShowTracks ||
                                (this.xAxis.hide(), this.yAxis.hide());
                        }),
                        u([L(300)], t.prototype, "autoHideOnIdle", null),
                        t
                    );
                })(),
                $ = new WeakMap();
            function J(t) {
                return Math.pow(t - 1, 3) + 1;
            }
            var Z,
                tt,
                et,
                nt = (function () {
                    function t(t, e) {
                        var n = this.constructor;
                        (this.scrollbar = t),
                            (this.name = n.pluginName),
                            (this.options = i(i({}, n.defaultOptions), e));
                    }
                    return (
                        (t.prototype.onInit = function () {}),
                        (t.prototype.onDestroy = function () {}),
                        (t.prototype.onUpdate = function () {}),
                        (t.prototype.onRender = function (t) {}),
                        (t.prototype.transformDelta = function (t, e) {
                            return i({}, t);
                        }),
                        (t.pluginName = ""),
                        (t.defaultOptions = {}),
                        t
                    );
                })(),
                rt = { order: new Set(), constructors: {} };
            function ot(t) {
                var e = F(t),
                    n = t.containerEl;
                e(n, "keydown", function (e) {
                    var r = document.activeElement;
                    if (
                        (r === n || n.contains(r)) &&
                        !(function (t) {
                            return (
                                !(
                                    "INPUT" !== t.tagName &&
                                    "SELECT" !== t.tagName &&
                                    "TEXTAREA" !== t.tagName &&
                                    !t.isContentEditable
                                ) && !t.disabled
                            );
                        })(r)
                    ) {
                        var o = (function (t, e) {
                            var n = t.size,
                                r = t.limit,
                                o = t.offset;
                            switch (e) {
                                case Z.TAB:
                                    return (function (t) {
                                        requestAnimationFrame(function () {
                                            t.scrollIntoView(
                                                document.activeElement,
                                                {
                                                    offsetTop:
                                                        t.size.container
                                                            .height / 2,
                                                    onlyScrollIfNeeded: !0,
                                                }
                                            );
                                        });
                                    })(t);
                                case Z.SPACE:
                                    return [0, 200];
                                case Z.PAGE_UP:
                                    return [0, 40 - n.container.height];
                                case Z.PAGE_DOWN:
                                    return [0, n.container.height - 40];
                                case Z.END:
                                    return [0, r.y - o.y];
                                case Z.HOME:
                                    return [0, -o.y];
                                case Z.LEFT:
                                    return [-40, 0];
                                case Z.UP:
                                    return [0, -40];
                                case Z.RIGHT:
                                    return [40, 0];
                                case Z.DOWN:
                                    return [0, 40];
                                default:
                                    return null;
                            }
                        })(t, e.keyCode || e.which);
                        if (o) {
                            var i = o[0],
                                u = o[1];
                            t.addTransformableMomentum(i, u, e, function (n) {
                                n
                                    ? e.preventDefault()
                                    : (t.containerEl.blur(),
                                      t.parent && t.parent.containerEl.focus());
                            });
                        }
                    }
                });
            }
            function it(t) {
                var e,
                    n,
                    r,
                    o,
                    i,
                    u = F(t),
                    c = t.containerEl,
                    a = t.track,
                    s = a.xAxis,
                    f = a.yAxis;
                function l(e, n) {
                    var r = t.size;
                    return e === tt.X
                        ? (n /
                              (r.container.width +
                                  (s.thumb.realSize - s.thumb.displaySize))) *
                              r.content.width
                        : e === tt.Y
                        ? (n /
                              (r.container.height +
                                  (f.thumb.realSize - f.thumb.displaySize))) *
                          r.content.height
                        : 0;
                }
                function p(t) {
                    return W(t, [s.element, s.thumb.element])
                        ? tt.X
                        : W(t, [f.element, f.thumb.element])
                        ? tt.Y
                        : void 0;
                }
                u(c, "click", function (e) {
                    if (!n && W(e.target, [s.element, f.element])) {
                        var r = e.target,
                            o = p(r),
                            i = r.getBoundingClientRect(),
                            u = H(e),
                            c = t.offset,
                            a = t.limit;
                        if (o === tt.X) {
                            var h = u.x - i.left - s.thumb.displaySize / 2;
                            t.setMomentum(A(l(o, h) - c.x, -c.x, a.x - c.x), 0);
                        }
                        o === tt.Y &&
                            ((h = u.y - i.top - f.thumb.displaySize / 2),
                            t.setMomentum(
                                0,
                                A(l(o, h) - c.y, -c.y, a.y - c.y)
                            ));
                    }
                }),
                    u(c, "mousedown", function (n) {
                        if (W(n.target, [s.thumb.element, f.thumb.element])) {
                            e = !0;
                            var u = n.target,
                                a = H(n),
                                l = u.getBoundingClientRect();
                            (o = p(u)),
                                (r = { x: a.x - l.left, y: a.y - l.top }),
                                (i = c.getBoundingClientRect()),
                                U(t.containerEl, { "-user-select": "none" });
                        }
                    }),
                    u(window, "mousemove", function (u) {
                        if (e) {
                            n = !0;
                            var c = t.offset,
                                a = H(u);
                            if (o === tt.X) {
                                var s = a.x - r.x - i.left;
                                t.setPosition(l(o, s), c.y);
                            }
                            o === tt.Y &&
                                ((s = a.y - r.y - i.top),
                                t.setPosition(c.x, l(o, s)));
                        }
                    }),
                    u(window, "mouseup blur", function () {
                        (e = n = !1), U(t.containerEl, { "-user-select": "" });
                    });
            }
            function ut(t) {
                F(t)(window, "resize", D(t.update.bind(t), 300));
            }
            function ct(t) {
                var e,
                    n = F(t),
                    r = t.containerEl,
                    o = t.contentEl,
                    i = !1;
                n(window, "mousemove", function (n) {
                    i &&
                        (cancelAnimationFrame(e),
                        (function n(r) {
                            var o = r.x,
                                i = r.y;
                            if (o || i) {
                                var u = t.offset,
                                    c = t.limit;
                                t.setMomentum(
                                    A(u.x + o, 0, c.x) - u.x,
                                    A(u.y + i, 0, c.y) - u.y
                                ),
                                    (e = requestAnimationFrame(function () {
                                        n({ x: o, y: i });
                                    }));
                            }
                        })(
                            (function (t, e) {
                                var n = t.bounding,
                                    r = n.top,
                                    o = n.right,
                                    i = n.bottom,
                                    u = n.left,
                                    c = H(e),
                                    a = c.x,
                                    s = c.y,
                                    f = { x: 0, y: 0 };
                                return (
                                    (0 === a && 0 === s) ||
                                        (a > o - 20
                                            ? (f.x = a - o + 20)
                                            : a < u + 20 && (f.x = a - u - 20),
                                        s > i - 20
                                            ? (f.y = s - i + 20)
                                            : s < r + 20 && (f.y = s - r - 20),
                                        (f.x *= 2),
                                        (f.y *= 2)),
                                    f
                                );
                            })(t, n)
                        ));
                }),
                    n(o, "selectstart", function (t) {
                        t.stopPropagation(), cancelAnimationFrame(e), (i = !0);
                    }),
                    n(window, "mouseup blur", function () {
                        cancelAnimationFrame(e), (i = !1);
                    }),
                    n(r, "scroll", function (t) {
                        t.preventDefault(), (r.scrollTop = r.scrollLeft = 0);
                    });
            }
            function at(t) {
                var e,
                    n = /Android/.test(navigator.userAgent) ? 3 : 2,
                    r = t.options.delegateTo || t.containerEl,
                    o = new Y(),
                    i = F(t),
                    u = 0;
                i(r, "touchstart", function (n) {
                    o.track(n),
                        t.setMomentum(0, 0),
                        0 === u &&
                            ((e = t.options.damping),
                            (t.options.damping = Math.max(e, 0.5))),
                        u++;
                }),
                    i(r, "touchmove", function (e) {
                        if (!et || et === t) {
                            o.update(e);
                            var n = o.getDelta(),
                                r = n.x,
                                i = n.y;
                            t.addTransformableMomentum(r, i, e, function (n) {
                                n &&
                                    e.cancelable &&
                                    (e.preventDefault(), (et = t));
                            });
                        }
                    }),
                    i(r, "touchcancel touchend", function (r) {
                        var i = o.getVelocity(),
                            c = { x: 0, y: 0 };
                        Object.keys(i).forEach(function (t) {
                            var r = i[t] / e;
                            c[t] = Math.abs(r) < 50 ? 0 : r * n;
                        }),
                            t.addTransformableMomentum(c.x, c.y, r),
                            0 == --u && (t.options.damping = e),
                            o.release(r),
                            (et = null);
                    });
            }
            function st(t) {
                F(t)(
                    t.options.delegateTo || t.containerEl,
                    "onwheel" in window ||
                        document.implementation.hasFeature(
                            "Events.wheel",
                            "3.0"
                        )
                        ? "wheel"
                        : "mousewheel",
                    function (e) {
                        var n = (function (t) {
                                if ("deltaX" in t) {
                                    var e = pt(t.deltaMode);
                                    return {
                                        x: (t.deltaX / ft.STANDARD) * e,
                                        y: (t.deltaY / ft.STANDARD) * e,
                                    };
                                }
                                return "wheelDeltaX" in t
                                    ? {
                                          x: t.wheelDeltaX / ft.OTHERS,
                                          y: t.wheelDeltaY / ft.OTHERS,
                                      }
                                    : { x: 0, y: t.wheelDelta / ft.OTHERS };
                            })(e),
                            r = n.x,
                            o = n.y;
                        t.addTransformableMomentum(r, o, e, function (t) {
                            t && e.preventDefault();
                        });
                    }
                );
            }
            !(function (t) {
                (t[(t.TAB = 9)] = "TAB"),
                    (t[(t.SPACE = 32)] = "SPACE"),
                    (t[(t.PAGE_UP = 33)] = "PAGE_UP"),
                    (t[(t.PAGE_DOWN = 34)] = "PAGE_DOWN"),
                    (t[(t.END = 35)] = "END"),
                    (t[(t.HOME = 36)] = "HOME"),
                    (t[(t.LEFT = 37)] = "LEFT"),
                    (t[(t.UP = 38)] = "UP"),
                    (t[(t.RIGHT = 39)] = "RIGHT"),
                    (t[(t.DOWN = 40)] = "DOWN");
            })(Z || (Z = {})),
                (function (t) {
                    (t[(t.X = 0)] = "X"), (t[(t.Y = 1)] = "Y");
                })(tt || (tt = {}));
            var ft = { STANDARD: 1, OTHERS: -3 },
                lt = [1, 28, 500],
                pt = function (t) {
                    return lt[t] || lt[0];
                },
                ht = new Map(),
                dt = (function () {
                    function t(t, e) {
                        var n = this;
                        (this.offset = { x: 0, y: 0 }),
                            (this.limit = { x: 1 / 0, y: 1 / 0 }),
                            (this.bounding = {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0,
                            }),
                            (this._plugins = []),
                            (this._momentum = { x: 0, y: 0 }),
                            (this._listeners = new Set()),
                            (this.containerEl = t);
                        var r = (this.contentEl =
                            document.createElement("div"));
                        (this.options = new N(e)),
                            t.setAttribute("data-scrollbar", "true"),
                            t.setAttribute("tabindex", "-1"),
                            U(t, { overflow: "hidden", outline: "none" }),
                            window.navigator.msPointerEnabled &&
                                (t.style.msTouchAction = "none"),
                            (r.className = "scroll-content"),
                            Array.from(t.childNodes).forEach(function (t) {
                                r.appendChild(t);
                            }),
                            t.appendChild(r),
                            (this.track = new Q(this)),
                            (this.size = this.getSize()),
                            (this._plugins = (function (t, e) {
                                return Array.from(rt.order)
                                    .filter(function (t) {
                                        return !1 !== e[t];
                                    })
                                    .map(function (n) {
                                        var r = new (0, rt.constructors[n])(
                                            t,
                                            e[n]
                                        );
                                        return (e[n] = r.options), r;
                                    });
                            })(this, this.options.plugins));
                        var o = t.scrollLeft,
                            i = t.scrollTop;
                        (t.scrollLeft = t.scrollTop = 0),
                            this.setPosition(o, i, { withoutCallbacks: !0 });
                        var u = window,
                            c =
                                u.MutationObserver ||
                                u.WebKitMutationObserver ||
                                u.MozMutationObserver;
                        "function" == typeof c &&
                            ((this._observer = new c(function () {
                                n.update();
                            })),
                            this._observer.observe(r, {
                                subtree: !0,
                                childList: !0,
                            })),
                            ht.set(t, this),
                            requestAnimationFrame(function () {
                                n._init();
                            });
                    }
                    return (
                        Object.defineProperty(t.prototype, "parent", {
                            get: function () {
                                for (
                                    var t = this.containerEl.parentElement;
                                    t;

                                ) {
                                    var e = ht.get(t);
                                    if (e) return e;
                                    t = t.parentElement;
                                }
                                return null;
                            },
                            enumerable: !0,
                            configurable: !0,
                        }),
                        Object.defineProperty(t.prototype, "scrollTop", {
                            get: function () {
                                return this.offset.y;
                            },
                            set: function (t) {
                                this.setPosition(this.scrollLeft, t);
                            },
                            enumerable: !0,
                            configurable: !0,
                        }),
                        Object.defineProperty(t.prototype, "scrollLeft", {
                            get: function () {
                                return this.offset.x;
                            },
                            set: function (t) {
                                this.setPosition(t, this.scrollTop);
                            },
                            enumerable: !0,
                            configurable: !0,
                        }),
                        (t.prototype.getSize = function () {
                            return (function (t) {
                                var e = t.containerEl,
                                    n = t.contentEl;
                                return {
                                    container: {
                                        width: e.clientWidth,
                                        height: e.clientHeight,
                                    },
                                    content: {
                                        width:
                                            n.offsetWidth -
                                            n.clientWidth +
                                            n.scrollWidth,
                                        height:
                                            n.offsetHeight -
                                            n.clientHeight +
                                            n.scrollHeight,
                                    },
                                };
                            })(this);
                        }),
                        (t.prototype.update = function () {
                            !(function (t) {
                                var e = t.getSize(),
                                    n = {
                                        x: Math.max(
                                            e.content.width - e.container.width,
                                            0
                                        ),
                                        y: Math.max(
                                            e.content.height -
                                                e.container.height,
                                            0
                                        ),
                                    },
                                    r = t.containerEl.getBoundingClientRect(),
                                    o = {
                                        top: Math.max(r.top, 0),
                                        right: Math.min(
                                            r.right,
                                            window.innerWidth
                                        ),
                                        bottom: Math.min(
                                            r.bottom,
                                            window.innerHeight
                                        ),
                                        left: Math.max(r.left, 0),
                                    };
                                (t.size = e),
                                    (t.limit = n),
                                    (t.bounding = o),
                                    t.track.update(),
                                    t.setPosition();
                            })(this),
                                this._plugins.forEach(function (t) {
                                    t.onUpdate();
                                });
                        }),
                        (t.prototype.isVisible = function (t) {
                            return (function (t, e) {
                                var n = t.bounding,
                                    r = e.getBoundingClientRect(),
                                    o = Math.max(n.top, r.top),
                                    i = Math.max(n.left, r.left),
                                    u = Math.min(n.right, r.right);
                                return (
                                    o < Math.min(n.bottom, r.bottom) && i < u
                                );
                            })(this, t);
                        }),
                        (t.prototype.setPosition = function (t, e, n) {
                            var r = this;
                            void 0 === t && (t = this.offset.x),
                                void 0 === e && (e = this.offset.y),
                                void 0 === n && (n = {});
                            var o = (function (t, e, n) {
                                var r = t.options,
                                    o = t.offset,
                                    u = t.limit,
                                    c = t.track,
                                    a = t.contentEl;
                                return (
                                    r.renderByPixels &&
                                        ((e = Math.round(e)),
                                        (n = Math.round(n))),
                                    (e = A(e, 0, u.x)),
                                    (n = A(n, 0, u.y)),
                                    e !== o.x && c.xAxis.show(),
                                    n !== o.y && c.yAxis.show(),
                                    r.alwaysShowTracks || c.autoHideOnIdle(),
                                    e === o.x && n === o.y
                                        ? null
                                        : ((o.x = e),
                                          (o.y = n),
                                          U(a, {
                                              "-transform":
                                                  "translate3d(" +
                                                  -e +
                                                  "px, " +
                                                  -n +
                                                  "px, 0)",
                                          }),
                                          c.update(),
                                          { offset: i({}, o), limit: i({}, u) })
                                );
                            })(this, t, e);
                            o &&
                                !n.withoutCallbacks &&
                                this._listeners.forEach(function (t) {
                                    t.call(r, o);
                                });
                        }),
                        (t.prototype.scrollTo = function (t, e, n, r) {
                            void 0 === t && (t = this.offset.x),
                                void 0 === e && (e = this.offset.y),
                                void 0 === n && (n = 0),
                                void 0 === r && (r = {}),
                                (function (t, e, n, r, o) {
                                    void 0 === r && (r = 0);
                                    var i = void 0 === o ? {} : o,
                                        u = i.easing,
                                        c = void 0 === u ? J : u,
                                        a = i.callback,
                                        s = t.options,
                                        f = t.offset,
                                        l = t.limit;
                                    s.renderByPixels &&
                                        ((e = Math.round(e)),
                                        (n = Math.round(n)));
                                    var p = f.x,
                                        h = f.y,
                                        d = A(e, 0, l.x) - p,
                                        v = A(n, 0, l.y) - h,
                                        y = Date.now();
                                    cancelAnimationFrame($.get(t)),
                                        (function e() {
                                            var n = Date.now() - y,
                                                o = r
                                                    ? c(Math.min(n / r, 1))
                                                    : 1;
                                            if (
                                                (t.setPosition(
                                                    p + d * o,
                                                    h + v * o
                                                ),
                                                n >= r)
                                            )
                                                "function" == typeof a &&
                                                    a.call(t);
                                            else {
                                                var i =
                                                    requestAnimationFrame(e);
                                                $.set(t, i);
                                            }
                                        })();
                                })(this, t, e, n, r);
                        }),
                        (t.prototype.scrollIntoView = function (t, e) {
                            void 0 === e && (e = {}),
                                (function (t, e, n) {
                                    var r = void 0 === n ? {} : n,
                                        o = r.alignToTop,
                                        i = void 0 === o || o,
                                        u = r.onlyScrollIfNeeded,
                                        c = void 0 !== u && u,
                                        a = r.offsetTop,
                                        s = void 0 === a ? 0 : a,
                                        f = r.offsetLeft,
                                        l = void 0 === f ? 0 : f,
                                        p = r.offsetBottom,
                                        h = void 0 === p ? 0 : p,
                                        d = t.containerEl,
                                        v = t.bounding,
                                        y = t.offset,
                                        m = t.limit;
                                    if (e && d.contains(e)) {
                                        var g = e.getBoundingClientRect();
                                        if (!c || !t.isVisible(e)) {
                                            var b = i
                                                ? g.top - v.top - s
                                                : g.bottom - v.bottom + h;
                                            t.setMomentum(
                                                g.left - v.left - l,
                                                A(b, -y.y, m.y - y.y)
                                            );
                                        }
                                    }
                                })(this, t, e);
                        }),
                        (t.prototype.addListener = function (t) {
                            if ("function" != typeof t)
                                throw new TypeError(
                                    "[smooth-scrollbar] scrolling listener should be a function"
                                );
                            this._listeners.add(t);
                        }),
                        (t.prototype.removeListener = function (t) {
                            this._listeners.delete(t);
                        }),
                        (t.prototype.addTransformableMomentum = function (
                            t,
                            e,
                            n,
                            r
                        ) {
                            this._updateDebounced();
                            var o = this._plugins.reduce(
                                    function (t, e) {
                                        return e.transformDelta(t, n) || t;
                                    },
                                    { x: t, y: e }
                                ),
                                i = !this._shouldPropagateMomentum(o.x, o.y);
                            i && this.addMomentum(o.x, o.y),
                                r && r.call(this, i);
                        }),
                        (t.prototype.addMomentum = function (t, e) {
                            this.setMomentum(
                                this._momentum.x + t,
                                this._momentum.y + e
                            );
                        }),
                        (t.prototype.setMomentum = function (t, e) {
                            0 === this.limit.x && (t = 0),
                                0 === this.limit.y && (e = 0),
                                this.options.renderByPixels &&
                                    ((t = Math.round(t)), (e = Math.round(e))),
                                (this._momentum.x = t),
                                (this._momentum.y = e);
                        }),
                        (t.prototype.updatePluginOptions = function (t, e) {
                            this._plugins.forEach(function (n) {
                                n.name === t && Object.assign(n.options, e);
                            });
                        }),
                        (t.prototype.destroy = function () {
                            var t = this.containerEl,
                                e = this.contentEl;
                            !(function (t) {
                                var e = C.get(t);
                                e &&
                                    (e.forEach(function (t) {
                                        var e = t.elem,
                                            n = t.eventName,
                                            r = t.handler;
                                        e.removeEventListener(n, r, R());
                                    }),
                                    C.delete(t));
                            })(this),
                                this._listeners.clear(),
                                this.setMomentum(0, 0),
                                cancelAnimationFrame(this._renderID),
                                this._observer && this._observer.disconnect(),
                                ht.delete(this.containerEl);
                            for (
                                var n = Array.from(e.childNodes);
                                t.firstChild;

                            )
                                t.removeChild(t.firstChild);
                            n.forEach(function (e) {
                                t.appendChild(e);
                            }),
                                U(t, { overflow: "" }),
                                (t.scrollTop = this.scrollTop),
                                (t.scrollLeft = this.scrollLeft),
                                this._plugins.forEach(function (t) {
                                    t.onDestroy();
                                }),
                                (this._plugins.length = 0);
                        }),
                        (t.prototype._init = function () {
                            var t = this;
                            this.update(),
                                Object.keys(r).forEach(function (e) {
                                    r[e](t);
                                }),
                                this._plugins.forEach(function (t) {
                                    t.onInit();
                                }),
                                this._render();
                        }),
                        (t.prototype._updateDebounced = function () {
                            this.update();
                        }),
                        (t.prototype._shouldPropagateMomentum = function (
                            t,
                            e
                        ) {
                            void 0 === t && (t = 0), void 0 === e && (e = 0);
                            var n = this.options,
                                r = this.offset,
                                o = this.limit;
                            if (!n.continuousScrolling) return !1;
                            0 === o.x && 0 === o.y && this._updateDebounced();
                            var i = A(t + r.x, 0, o.x),
                                u = A(e + r.y, 0, o.y),
                                c = !0;
                            return (
                                (c = (c = c && i === r.x) && u === r.y) &&
                                (r.x === o.x ||
                                    0 === r.x ||
                                    r.y === o.y ||
                                    0 === r.y)
                            );
                        }),
                        (t.prototype._render = function () {
                            var t = this._momentum;
                            if (t.x || t.y) {
                                var e = this._nextTick("x"),
                                    n = this._nextTick("y");
                                (t.x = e.momentum),
                                    (t.y = n.momentum),
                                    this.setPosition(e.position, n.position);
                            }
                            var r = i({}, this._momentum);
                            this._plugins.forEach(function (t) {
                                t.onRender(r);
                            }),
                                (this._renderID = requestAnimationFrame(
                                    this._render.bind(this)
                                ));
                        }),
                        (t.prototype._nextTick = function (t) {
                            var e = this.options,
                                n = this.offset,
                                r = this._momentum,
                                o = n[t],
                                i = r[t];
                            if (Math.abs(i) <= 0.1)
                                return { momentum: 0, position: o + i };
                            var u = i * (1 - e.damping);
                            return (
                                e.renderByPixels && (u |= 0),
                                { momentum: u, position: o + i - u }
                            );
                        }),
                        u(
                            [L(100, { leading: !0 })],
                            t.prototype,
                            "_updateDebounced",
                            null
                        ),
                        t
                    );
                })(),
                vt = "smooth-scrollbar-style",
                yt = !1;
            function mt() {
                if (!yt && "undefined" != typeof window) {
                    var t = document.createElement("style");
                    (t.id = vt),
                        (t.textContent =
                            "\n[data-scrollbar] {\n  display: block;\n  position: relative;\n}\n\n.scroll-content {\n  -webkit-transform: translate3d(0, 0, 0);\n          transform: translate3d(0, 0, 0);\n}\n\n.scrollbar-track {\n  position: absolute;\n  opacity: 0;\n  z-index: 1;\n  background: rgba(222, 222, 222, .75);\n  -webkit-user-select: none;\n     -moz-user-select: none;\n      -ms-user-select: none;\n          user-select: none;\n  -webkit-transition: opacity 0.5s 0.5s ease-out;\n          transition: opacity 0.5s 0.5s ease-out;\n}\n.scrollbar-track.show,\n.scrollbar-track:hover {\n  opacity: 1;\n  -webkit-transition-delay: 0s;\n          transition-delay: 0s;\n}\n\n.scrollbar-track-x {\n  bottom: 0;\n  left: 0;\n  width: 100%;\n  height: 8px;\n}\n.scrollbar-track-y {\n  top: 0;\n  right: 0;\n  width: 8px;\n  height: 100%;\n}\n.scrollbar-thumb {\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 8px;\n  height: 8px;\n  background: rgba(0, 0, 0, .5);\n  border-radius: 4px;\n}\n"),
                        document.head && document.head.appendChild(t),
                        (yt = !0);
                }
            }
            n.d(e, "ScrollbarPlugin", function () {
                return nt;
            });
            /*!
             * cast `I.Scrollbar` to `Scrollbar` to avoid error
             *
             * `I.Scrollbar` is not assignable to `Scrollbar`:
             *     "privateProp" is missing in `I.Scrollbar`
             *
             * @see https://github.com/Microsoft/TypeScript/issues/2672
             */
            var gt = (function (t) {
                function e() {
                    return (null !== t && t.apply(this, arguments)) || this;
                }
                return (
                    (function (t, e) {
                        function n() {
                            this.constructor = t;
                        }
                        o(t, e),
                            (t.prototype =
                                null === e
                                    ? Object.create(e)
                                    : ((n.prototype = e.prototype), new n()));
                    })(e, t),
                    (e.init = function (t, e) {
                        if (!t || 1 !== t.nodeType)
                            throw new TypeError(
                                "expect element to be DOM Element, but got " + t
                            );
                        return mt(), ht.has(t) ? ht.get(t) : new dt(t, e);
                    }),
                    (e.initAll = function (t) {
                        return Array.from(
                            document.querySelectorAll("[data-scrollbar]"),
                            function (n) {
                                return e.init(n, t);
                            }
                        );
                    }),
                    (e.has = function (t) {
                        return ht.has(t);
                    }),
                    (e.get = function (t) {
                        return ht.get(t);
                    }),
                    (e.getAll = function () {
                        return Array.from(ht.values());
                    }),
                    (e.destroy = function (t) {
                        var e = ht.get(t);
                        e && e.destroy();
                    }),
                    (e.destroyAll = function () {
                        ht.forEach(function (t) {
                            t.destroy();
                        });
                    }),
                    (e.use = function () {
                        for (var t = [], e = 0; e < arguments.length; e++)
                            t[e] = arguments[e];
                        return function () {
                            for (var t = [], e = 0; e < arguments.length; e++)
                                t[e] = arguments[e];
                            t.forEach(function (t) {
                                var e = t.pluginName;
                                if (!e)
                                    throw new TypeError(
                                        "plugin name is required"
                                    );
                                rt.order.add(e), (rt.constructors[e] = t);
                            });
                        }.apply(void 0, t);
                    }),
                    (e.attachStyle = function () {
                        return mt();
                    }),
                    (e.detachStyle = function () {
                        return (function () {
                            if (yt && "undefined" != typeof window) {
                                var t = document.getElementById(vt);
                                t &&
                                    t.parentNode &&
                                    (t.parentNode.removeChild(t), (yt = !1));
                            }
                        })();
                    }),
                    (e.version = "8.6.2"),
                    (e.ScrollbarPlugin = nt),
                    e
                );
            })(dt);
            e.default = gt;
        },
    ]).default;
});
