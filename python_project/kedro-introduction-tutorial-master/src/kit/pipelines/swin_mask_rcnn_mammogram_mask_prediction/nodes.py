import numpy as np
from PIL import Image
from mmdet.apis import inference_detector, init_detector, show_result_pyplot
def predict_mask_result(img):
    check = 'data/06_models/swin/mask/epoch_4.pth'
    check = 'data/06_models/swin/mask1/epoch_10.pth'
    cfg = 'data/06_models/swin/mask/mask_rcnn_swin_tiny_patch4_window7_mstrain_480-800_adamw_3x_coco.py'
    cfg='data/06_models/swin/mask1/mask_rcnn_swin_tiny_patch4_window7_mstrain_480-800_adamw_1x_coco.py'
    model = init_detector(cfg, check, device='cpu')
    img = np.asarray(img)
    img = np.asarray([ np.asarray(img), np.asarray(img), np.asarray(img)]).transpose(1,2,0)
    result5 = inference_detector(model, img)
    im = model.show_result(img, result5, score_thr=0.1)
    im = Image.fromarray(im)
    return im


