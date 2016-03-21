/*
# "VOTItaly" Plugin for Joomla! 1.5.x - Version 1.2
# License: http://www.gnu.org/copyleft/gpl.html
# Authors: Luca Scarpa & Silvio Zennaro
# Copyright (c) 2006 - 2009 Siloos snc - http://www.siloos.it
# Project page at http://www.joomitaly.com - Demos at http://demo.joomitaly.com
# ***Last update: Aug 27th, 2009***
*/


var VotitalyPlugin = new Class ({
	options: {
    submiturl: '/plugins/content/ji_votitaly_ajax.php',
		loadingimg: '/plugins/content/ji_votitaly/images/loading.gif',
		show_stars: true,
		star_description: 'undefined',
		language: {
			updating: 'undefined',
			thanks: 'undefined',
			already_vote: 'undefined',
			votes: 'undefined',
			vote: 'undefined',
			average: 'undefined',
			outof: 'undefined',
			error1: 'undefined',
			error2: 'undefined',
			error3: 'undefined',
			error4: 'undefined',
			error5: 'undefined'
			}
  },
	
  initialize: function(options){
    this.setOptions(options);

		this.elements = [];
		this.logmessages = [];
		
		this.build();
	},
	
	build: function () {
		var arrOfElements = $$('div.votitaly-inline-rating');
		
		if ($type(arrOfElements) != 'array') {
			this.log('Parametri di inizializzazione errati!');
			return false;
		}
		if (!arrOfElements.length) {
			this.log('Nessun elemento di inizializzazione configurato!');
			return false;			
		}

		// analisi degli elementi passati come parametro
		var _class = this;
		var container_fx = box_fx = [];
		arrOfElements.each(function (el) {
			var actual_el_id = el.getElement('div.votitaly-get-id').getText();
			var actual_cus_id = el.getElement('div.customerid').getText();
			var actual_id = el.id;
var usertype = el.getElement('div.adminside').getText();
if(usertype=='admin'){
var tasktype='input';
var taskevent='blur';

}else{
var tasktype='a';
var taskevent='click';

}
			var togglers = el.getElements(tasktype+'.votitaly-toggler');

			container_fx[actual_el_id] = new Fx.Styles(actual_id, {duration:1000, wait:false});
			box_fx[actual_el_id] = new Fx.Styles($(actual_id).getElement('div.votitaly-box'), {duration:1000, wait:false});
			
			// foreach star to click
			togglers.each(function(tog) {
				
				tog.addEvent(taskevent, function (e) {
					var container_id = actual_id;
					var element_id = actual_el_id;
					var customer_id = actual_cus_id;
					var user_type = usertype;
					if(user_type == 'admin')
					{
					var rating_val=document.getElementById('adminrate').value;
					
					if(rating_val > 5)
					{ 
					alert('Max rating is 5'); 
					document.getElementById('adminrate').value = '';
					document.getElementById('adminrate').focus();
					return false; } else if(rating_val.length>3){
					alert('Only one digit allowed after the decimal point. Example 3.5'); 
					document.getElementById('adminrate').value = '';
					document.getElementById('adminrate').focus();
					return false;
					}
					}
					else
					{
					var rating_val = tog.getText();
					}
					
					container_fx[element_id].start({
						'opacity': 0.3
					});
					
					// increasing performance:
					$(container_id).getElement('div.votitaly-box').setHTML('<img src="'+_class.options.loadingimg+'" class="loading" /> '+_class.options.language.updating);
					
					new Ajax(_class.options.submiturl, {
						method: 'post',
						data: 'task=vote&cid='+element_id+'&cusid='+customer_id+'&user_type='+user_type+'&rating='+rating_val,
						onComplete: function(response){
							var json = Json.evaluate(response);
								var cont_el = $(container_id);
								// modifica width li.current-rating
								cont_el.getElement('li.current-rating').setStyle('width', json.width);
								
								// opacity 1 su tutto il div
								container_fx[element_id].start({
									'opacity': 1,
									'background-color': '#fff'
								});
								// effetto sul box per ringraziamenti
								box_fx[element_id].start({'opacity': 0}).chain(function() {
									cont_el.getElement('div.votitaly-box').setHTML(
										(json.success ? _class.options.language.thanks : _class._getErrorString(json.return_code))
									);
									box_fx[element_id].start({'opacity': 1}); // visibile
									
								}).chain(function () {
									var func = function() {
										box_fx[element_id].start({'opacity': 0}).chain(function() {
											/*_class._update_voting_description(
													cont_el.getElement('div.votitaly-box'),
													json.num_votes, // #totale voti
													json.average,		// media voti
													json.out_of			// massimo scala votazione
											);*/ // by lalitha
											box_fx[element_id].start({'opacity': 1}); // visibile
										});
									}.delay((json.success ? 1000 : 4000));
								});
						}
					}).request();
				});
			});
		});
		
	},



	_update_voting_description: function (box_el, num_votes, average, out_of) {
		var string = this.options.star_description;

		string = string.replace(/{num_votes}/ig, num_votes)
							.replace(/{num_average}/ig, average)
							.replace(/{num_outof}/ig, out_of)
							.replace(/#LANG_VOTES/ig, num_votes == 1 ? this.options.language.vote : this.options.language.votes )
							.replace(/#LANG_AVERAGE/ig, this.options.language.average )
							.replace(/#LANG_OUTOF/ig, this.options.language.outof );

		box_el.setHTML(string);
		
	},

	_getErrorString: function (errno) {
		switch (errno) {
			case 1: return this.options.language.error1;
			case 2: return this.options.language.error2;
			case 3: return this.options.language.error3;
			case 4: return this.options.language.error4;
			case 5: return this.options.language.error5;
			default: return 'undefined';
		}
	},

	//-- error logs methods ---------------//
	log: function (string) {			
		this.logmessages.include(string);
	},
	showLogs: function () {
		this.logmessages.each(function (message) {
			console.log(message);
		});
	},
	hasLogs: function () {
		return this.logmessages.length > 0;
	},
	emptyLogs: function () {
		this.logmessages = [];
	}
});
VotitalyPlugin.implement(new Options);