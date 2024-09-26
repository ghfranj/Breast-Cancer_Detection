

import logging


logger = logging.getLogger(__name__)

import torch
def hello_world():
    print('this is torch version', torch.__version__)
    """
    Prints 'Hello World!'
    :return: str
    """
    output = "Hello World!"
    logger.info(output)
    return output
