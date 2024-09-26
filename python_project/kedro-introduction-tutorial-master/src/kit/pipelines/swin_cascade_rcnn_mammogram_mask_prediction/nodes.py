
# from torch import nn
# from mmcv import Config
import numpy as np
from PIL import Image
# from mmdet.models import build_detector
from mmdet.apis import inference_detector, init_detector, show_result_pyplot
def predict_cascade_result(img):
    check = 'data/06_models/swin/tiny_cascade/epoch_4.pth'
    check = 'data/06_models/swin/tiny_cascade/TINY_CASCADE/epoch_11.pth'
    check = 'data/06_models/swin/tiny_cascade/TINY_CASCADE/epoch_8.pth'
    cfg = 'data/06_models/swin/tiny_cascade/cascade_mask_rcnn_swin_tiny_patch4_window7_mstrain_480-800_giou_4conv1f_adamw_3x_coco.py'
    cfg = 'data/06_models/swin/tiny_cascade/TINY_CASCADE/cascade_mask_rcnn_swin_tiny_patch4_window7_mstrain_480-800_giou_4conv1f_adamw_1x_coco.py'
    model = init_detector(cfg, check, device='cpu')
    img = np.asarray(img)
    img = np.asarray([ np.asarray(img), np.asarray(img), np.asarray(img)]).transpose(1,2,0)
    result5 = inference_detector(model, img)
    im = model.show_result(img, result5, score_thr=0.15)
    im = Image.fromarray(im)
    return im


