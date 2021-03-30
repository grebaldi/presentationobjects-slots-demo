###############################################################################
###############################################################################
##                                                                           ##
##                      Neos Contribution Distribution                       ##
##                                                                           ##
###############################################################################
###############################################################################

###############################################################################
#                                VARIABLES                                    #
###############################################################################
SHELL=/bin/bash

###############################################################################
#                             INSTALL & CLEANUP                               #
###############################################################################
environment::
	@ddev version
	@ddev exec echo Node $$(node --version)
	@ddev exec echo Yarn $$(yarn --version)

setup::
	@$(MAKE) -s up
	@$(MAKE) -s install
	@ddev flow site:prune "'*'" || true
	@ddev flow user:delete "'*'" --assume-yes || true
	@ddev flow site:import Vendor.Site
	@ddev flow user:create --roles Administrator admin admin admin admin
	@ddev describe

refresh::
	@$(MAKE) -s up
	@$(MAKE) -s install
	@ddev describe

install::
	@mkdir -p Data/Logs
	@ddev composer install
	@ddev yarn
	@ddev composer flush
	@$(MAKE) -s build

cleanup::
	@ddev composer cleanup:php
	@ddev yarn cleanup:node

###############################################################################
#                               FRONTEND BUILD                                #
###############################################################################
build::
	@ddev yarn build

watch::
	@ddev yarn watch

###############################################################################
#                                  DDEV                                     #
###############################################################################
up::
	@ddev start

down::
	@ddev stop --unlist

prune::
	@ddev delete --omit-snapshot

restart::
	@ddev restart

logs::
	@ddev logs -f

###############################################################################
#                                  SSH                                        #
###############################################################################
ssh::
	@ddev ssh

ssh-mariadb::
	@ddev mysql
