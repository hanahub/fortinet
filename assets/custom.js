jQuery(document).ready(function($) {
    $("#btn_add_location").click(function(e) {
        var name = $("#location_name").val().trim();
        if (name == "") {
            alert("Please enter location name.");
        } else {
            var url = base_url + 'admin/Locations/ajax_add_location';
            var data = {"name": name};
            $.post(url, data, function(response) {
                if (response.result != 0) {
                    $("#field-location_id").append('<option value=' + response.result + '>' + name + '</option>');
                    $("#field-location_id").trigger("chosen:updated");
                    $(".new_location_modal").modal("toggle");
                    $("#location_name").val("");
                    console.log(response);
                }
            });
        }
    });
});


function ValidateIPaddress(ipaddress) {  
  if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress)) {  
    return (true)  
  }  
  alert("You have entered an invalid IP address!")  
  return (false)  
} 



/*define(["jquery", "fweb", "fweb.util/persist"], function($, fweb, persist) {
    "use strict";
    function AddressMenuController($scope) {
        var ADDRESS_EDIT_URI = "/p/firewall/object/address/edit/"
          , GROUP_EDIT_URI = "/p/firewall/object/address_group/edit/"
          , view = view_type.get();
        $scope.typeOptions = TYPE_LIST,
        $scope.objectTypeOptions = OBJECT_TYPE_LIST,
        $scope.viewType = view.type,
        $scope.objectViewType = view.object,
        $scope.typeOptionsVisible = showTypeSelection,
        $scope.objectTypeDisabled = $scope.viewType === TYPE.MULTICAST,
        $scope.setViewType = function(type) {
            view_type.set_type(type),
            $scope.viewType = type,
            $scope.objectTypeDisabled = type === TYPE.MULTICAST
        }
        ,
        $scope.setObjectViewType = function(type) {
            view_type.set_object_type(type),
            $scope.objectViewType = type
        }
        ,
        $scope.createNew = function(type) {
            var uri;
            uri = "address" === type ? ADDRESS_EDIT_URI : GROUP_EDIT_URI,
            window.location.href = uri
        }
        ,
        $scope.edit = function() {
            var uri, type, entry = $scope.menu.lastSelectedEntry, mkey = encodeURIComponent(entry.q_origin_key), path = entry.cmdb_path;
            path.indexOf("addrgrp") >= 0 ? (uri = GROUP_EDIT_URI + mkey + "/",
            type = "addrgrp6" === path ? "ipv6" : "explicit-proxy-addrgrp" === path ? "proxy_addrgrp" : "ipv4",
            uri = setQueryValue(uri, "group_type", type)) : (uri = ADDRESS_EDIT_URI + mkey + "/",
            type = "address6" === path ? "addr_ipv6" : "multicast-address" === path ? "multicast" : "explicit-proxy-address" === path ? "explicit_proxy" : "addr",
            uri = setQueryValue(uri, "addr_cat", type)),
            window.location.href = uri
        }
        ,
        $scope.editEnabled = $scope.cloneEnabled = function(entries) {
            return $scope.menu.$sectionRow ? !1 : entries && 1 === entries.length ? "nsx" !== entries[0].type : !1
        }
    }
    var TYPE_COOKIE = "address_list_type"
      , OBJECT_TYPE_COOKIE = "address_list_object_type"
      , showTypeSelection = !1
      , TYPE = {
        ALL: "all",
        IPV4: "ipv4"
    }
      , OBJECT_TYPE = {
        ADDRESS: "address",
        GROUP: "group",
        ALL: "all"
    };
    top.state && top.state.featureEnabled("gui-ipv6") && (TYPE.IPV6 = "ipv6",
    showTypeSelection = !0),
    top.state && top.state.featureEnabled("gui-explicit-proxy") && top.state.getInspectionMode() === top.state.INSPECTION_MODE.PROXY && (TYPE.EXPLICIT_PROXY = "explicitProxy",
    showTypeSelection = !0),
    top.state && top.state.featureEnabled("gui-multicast-policy") && (TYPE.MULTICAST = "multicast",
    showTypeSelection = !0);
    var load_qlist, make_list = function(obj) {
        return Object.keys(obj).map(function(key) {
            return obj[key]
        })
    }, TYPE_LIST = make_list(TYPE), OBJECT_TYPE_LIST = make_list(OBJECT_TYPE), view_type = function() {
        var type, object_type, is_valid_type = function(type) {
            return TYPE_LIST.indexOf(type) >= 0
        }, is_valid_object_type = function(type) {
            return OBJECT_TYPE_LIST.indexOf(type) >= 0
        };
        return {
            get: function() {
                return type || (type = persist.get(TYPE_COOKIE),
                is_valid_type(type) || (type = TYPE_LIST[0])),
                object_type || (object_type = persist.get(OBJECT_TYPE_COOKIE),
                is_valid_object_type(object_type) || (object_type = OBJECT_TYPE.ALL)),
                {
                    type: type,
                    object: object_type
                }
            },
            set_type: function(value) {
                if (!is_valid_type(value))
                    throw new Error("Invalid type");
                type = value,
                persist.put(TYPE_COOKIE, type),
                load_qlist()
            },
            set_object_type: function(value) {
                if (!is_valid_object_type(value))
                    throw new Error("Invalid object type");
                object_type = value,
                persist.put(OBJECT_TYPE_COOKIE, object_type),
                load_qlist()
            }
        }
    }(), enableFormat = function(td, col, entry) {
        var name = col.selector;
        return "enable" === entry[name] ? '<f-icon class="fa-enabled"></f-icon>' : ""
    }, setup_fqdn_tooltip = function(td, row) {
        "fqdn" === row.type && window.FQDN && FQDN.format(row.name).then(function(fqdn_details) {
            td.qtip({
                content: {
                    text: fqdn_details
                },
                position: {
                    target: "mouse",
                    adjust: {
                        x: 10,
                        y: 10
                    }
                }
            })
        })
    }, setup_nsx_tooltip = function(td, row) {
        function formatNsxDetailsToolTip(addrs, name) {
            if (!addrs || !Array.isArray(addrs) || !addrs.length)
                return $.getInfo("nsx_empty_address_list", [name]);
            var addr_list = "<div>" + addrs.map(function(a) {
                return "<label><li>" + a + "</li></label>"
            }).join("") + "</div>";
            return $.getInfo("nsx_address_list", [name]) + addr_list
        }
        if ("nsx" === row.type) {
            var addrs = (row.list || []).map(function(v) {
                return v.ip
            });
            td.qtip({
                content: {
                    text: formatNsxDetailsToolTip(addrs, row.name)
                },
                position: {
                    my: "top left",
                    at: "bottom left",
                    target: "mouse",
                    adjust: {
                        x: 10,
                        y: 10
                    },
                    viewport: $(window)
                }
            })
        }
    }, ip4_range_calculate = fweb.util.address_search.ip4_range_calculate, ip4_basic_search = fweb.util.address_search.ip4_basic_search, create_qlist_settings = function(list, map, intf_map) {
        var view = view_type.get();
        list = list.filter(function(entry) {
            var type = view.type
              , object = view.object;
            switch (entry.cmdb_path) {
            case "address":
                return !(type !== TYPE.ALL && type !== TYPE.IPV4 || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.ADDRESS);
            case "address6":
                return !(type !== TYPE.ALL && type !== TYPE.IPV6 || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.ADDRESS);
            case "explicit-proxy-address":
                return !(type !== TYPE.ALL && type !== TYPE.EXPLICIT_PROXY || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.ADDRESS);
            case "multicast-address":
                return type === TYPE.ALL && object !== OBJECT_TYPE.GROUP || type === TYPE.MULTICAST;
            case "addrgrp":
                return !(type !== TYPE.ALL && type !== TYPE.IPV4 || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.GROUP);
            case "addrgrp6":
                return !(type !== TYPE.ALL && type !== TYPE.IPV6 || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.GROUP);
            case "explicit-proxy-addrgrp":
                return !(type !== TYPE.ALL && type !== TYPE.EXPLICIT_PROXY || object !== OBJECT_TYPE.ALL && object !== OBJECT_TYPE.GROUP)
            }
            return fweb.log.error("Filtering doesn't handle \"" + entry.cmdb_path + '"'),
            !1
        });
        var settings = {
            source: list,
            columns: [{
                selector: "name",
                lang_key: "name"
            }, {
                selector: "cmdb_path",
                lang_key: "category"
            }, {
                selector: "type",
                lang_key: "type"
            }, {
                selector: "details",
                lang_key: "details"
            }, {
                selector: "intf",
                lang_key: "intf"
            }, {
                selector: "comment",
                lang_key: "comment"
            }, {
                selector: "visibility",
                lang_key: "Visibility"
            }, {
                selector: "allow-routing",
                lang_key: "Routable"
            }],
            default_columns: ["name", "type", "details", "intf", "visibility"],
            row_attr: [{
                selector: "can_delete",
                name: "can_delete"
            }],
            options: {
                ref_column: !0,
                cell_collection_formatter: {
                    enabled: !0
                }
            },
            paging: {
                enabled: !0
            },
            search: {
                enabled: !0,
                search_categories: !1,
                search_fn: {
                    details: function(entry, query, index) {
                        var row = list[index];
                        return "ip6"in row ? fweb.util.address_search.ip6.search(row.ip6, query) : "multicast-address" === row.cmdb_path ? ip4_basic_search([ip4_range_calculate(entry)], query) : fweb.util.address_search.cmdb.firewall.address(row, query)
                    }
                }
            },
            format_fn: {
                name: function(td, col, entry) {
                    if (td.addClass("info_with_icon"),
                    setup_fqdn_tooltip(td, entry),
                    "fqdn" === entry.type && window.FQDN) {
                        var ips = FQDN.addrs[entry.name].addrs;
                        (!ips || ips.length < 1) && (entry.q_class = "ftnt-address-invalid-fqdn",
                        td.parent().addClass("invalid"))
                    }
                    return '<f-icon class="' + entry.q_class + '"></f-icon><span>' + entry.name + "</span>"
                },
                cmdb_path: function(td, col, entry) {
                    return $.getInfo(entry.cmdb_path)
                },
                type: function(td, col, entry) {
                    var subtype = entry.cmdb_path.indexOf("address6") >= 0 ? "ipv6_" : "";
                    return $.getInfo("addr_type_" + subtype + entry.type)
                },
                visibility: enableFormat,
                "allow-routing": enableFormat,
                intf: function(td, col, entry) {
                    var mapped_intf = intf_map[entry.intf];
                    return mapped_intf ? '<f-icon class="' + mapped_intf.icon + '"></f-icon><span>' + mapped_intf.label + "</span>" : ""
                },
                details: {
                    type: "cell-collection",
                    requires_key: "group",
                    display_count: "name",
                    format_item: function(td, column, data) {
                        if (td) {
                            var cls, entry = map && map[data.cmdb_path] ? map[data.cmdb_path][data.name] : null;
                            if (entry || (entry = map && map[data.group_path] ? map[data.group_path][data.name] : null),
                            entry && "fqdn" === entry.type && window.FQDN) {
                                var ips = FQDN.addrs[entry.name].addrs;
                                (!ips || ips.length < 1) && (entry.q_class = "ftnt-address-invalid-fqdn")
                            }
                            return cls = entry ? entry.q_class : "",
                            '<f-icon class="' + cls + '"></f-icon><span>' + data.name + "</span>"
                        }
                        return data.name
                    },
                    format_fallback: function(td, column, row) {
                        return setup_fqdn_tooltip(td, row),
                        setup_nsx_tooltip(td, row),
                        row.details
                    }
                }
            }
        };
        return view.object === OBJECT_TYPE.ALL && view.type !== TYPE.MULTICAST || view.type === TYPE.ALL && showTypeSelection ? (settings.sections = ["cmdb_path"],
        settings.options.collapsible_sections = {
            "*": !1
        },
        settings.sort_sections_fn = null) : (settings.default_sort = [{
            selector: "name",
            direction: "asc"
        }],
        settings.options.sorting = !0),
        settings
    };
    return load_qlist = function() {
        var $loading = $("#qlist-loading").show();
        $.when(FQDN.get_resolved_addresses(), fweb.util.address.get(), fweb.util.firewallInterfaces.get()).then(function(fqdns, data, intfs) {
            var settings = create_qlist_settings(data.list, data.map, intfs.mapping);
            $loading.hide(),
            $("#content").empty().removeData().qlist(settings)
        })
    }
    ,
    load_qlist(),
    function(providers) {
        providers.$controller.register("AddressMenuController", AddressMenuController)
    }
});


!function(module, $) {
    "use strict";
    var addr_deferred;
    module.get_resolved_addresses = function() {
        return addr_deferred || (addr_deferred = $.Deferred(),
        $.getJSON("/api/v2/monitor/firewall/address-fqdns").then(function(data) {
            module.addrs = data.results,
            addr_deferred.resolve(data.results)
        })),
        addr_deferred.promise()
    }
    ,
    module.format = function(addr) {
        return module.get_resolved_addresses().then(function(fqdns) {
            var addrs = fqdns[addr].addrs
              , fqdn = fqdns[addr].fqdn;
            if (null == addrs || !Array.isArray(addrs) || addrs.length < 1)
                return $.getInfo("fqdn_unresolved", [fqdn || addr]);
            var addr_list = '<ul style="padding-left: 20px;">' + addrs.map(function(a) {
                return "<li>" + a + "</li>"
            }).join("") + "</ul>";
            return $.getInfo("fqdn_resolves_to", [fqdn]) + addr_list
        })
    }
}(window.FQDN = window.FQDN || {}, jQuery);
*/